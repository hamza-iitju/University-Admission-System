<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Student;
use App\Course;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreStudentsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Mail;


class HomePageController extends Controller
{

    public function index()
    {
        return view('mainTable.index');
    }

    public function table(Request $request)
    {
        $students = Student::filterByRequest($request)->paginate(9);

        return view('mainTable.search', compact('students'));
    }

    public function course(Course $course)
    {
        $students = Student::join('course_student', 'students.id', '=', 'course_student.student_id')
            ->where('course_id', $course->id)
            ->paginate(9);

        return view('mainTable.course', compact('students', 'course'));
    }

    public function student(Student $student)
    {
        return view('mainTable.student', compact ('student'));
    }

    public function create()
    {
        $courses = \App\Course::pluck('name', 'id');

        return view('student.create', compact('courses'));
    }

    /**
     * Store a newly created Student in storage.
     *
     * @param  \App\Http\Requests\StoreStudentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentsRequest $request)
    {
        // $request = $this->saveFiles($request);
        $student = Student::create($request->all());
        $student->courses()->sync(array_filter((array)$request->input('courses')));

        // return redirect()->route('admin.home');
        // return view('mainTable.index');
        return redirect()->back()->with('message', 'You have submitted successfully your informations! ');
    }

    public function sendmail(Request $request){
        dd("ERROR");
        $data["email"]=$request->get("email");
        $data["client_name"]=$request->get("client_name");
        $data["subject"]=$request->get("subject");

        $pdf = PDF::loadView('mails.mail', $data);

        try{
            Mail::send('mails.mail', $data, function($message)use($data,$pdf) {
            $message->to($data["email"], $data["client_name"])
            ->subject($data["subject"])
            ->attachData($pdf->output(), "invoice.pdf");
            });
        }catch(JWTException $exception){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
             $this->statusdesc  =   "Error sending mail";
             $this->statuscode  =   "0";

        }else{

           $this->statusdesc  =   "Message sent Succesfully";
           $this->statuscode  =   "1";
        }
        return view("/");
 }


 public function generatePDF($id)
 {
    $student = Student::findOrFail($id);

    $pdf = PDF::loadView('myPDF', array('student' => $student))->setPaper('a4');

    //Feedback mail to client
    // $pdf = PDF::loadView('myPDF', array('student' => $student))->setPaper('a5'); 
    // Mail::send('myPDF', $student, function($message) use ($student,$pdf){
    //         $message->from('hamza.iitju@gmail.com');
    //         $message->to('hamza.juit@gmail.com');
    //         $message->subject('Thank you message');
    //         //Attach PDF doc
    //         $message->attachData($pdf->output(),'customer.pdf');
    //     });

    // Session::flash('success', 'Hello &nbsp;'.$data['name'].'&nbsp;Thank You for choosing us. Will reply to your query as soon as possible');

    Mail::send('myPDF', array('student' => $student), function($message)use($student, $pdf)
    {
        $message->to($student->email, $student->name)
            ->attachData($pdf->output(), "Admit_card.pdf")
            ->subject("Admit Card for Jahangirnagar University undergraduate admission test")
            ->setBody("Dear Applicant, <br> Please find the attachment file for your admit card.", "text/html");
        });
        
        $pdf->download('Admit_card.pdf');

        // Admit card send status
        Student::where("id", '=',  $id)
        ->update(['decision'=> '1']);

    return redirect('admin/students')->with('message', 'Email sent successfully!');
 }

}