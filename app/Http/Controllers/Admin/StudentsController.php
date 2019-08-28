<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStudentsRequest;
use App\Http\Requests\Admin\UpdateStudentsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class StudentsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Student.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('student_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('student_delete')) {
                return abort(401);
            }
            $students = Student::onlyTrashed()->get();
        } else {
            $students = Student::all();
        }

        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating new Student.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('student_create')) {
            return abort(401);
        }
        
        $courses = \App\Course::pluck('name', 'id');

        return view('admin.students.create', compact('courses'));
    }

    /**
     * Store a newly created Student in storage.
     *
     * @param  \App\Http\Requests\StoreStudentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentsRequest $request)
    {
        if (! Gate::allows('student_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $student = Student::create($request->all());
        $student->courses()->sync(array_filter((array)$request->input('courses')));

        return redirect()->route('admin.students.index');
    }


    /**
     * Show the form for editing Student.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('student_edit')) {
            return abort(401);
        }
        
        $courses = \App\Course::pluck('name', 'id');

        $student = Student::findOrFail($id);

        return view('admin.students.edit', compact('student', 'courses'));
    }

    /**
     * Update Student in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentsRequest $request, $id)
    {
        if (! Gate::allows('student_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $student = Student::findOrFail($id);
        $student->update($request->all());
        $student->courses()->sync(array_filter((array)$request->input('courses')));

        return redirect()->route('admin.students.index');
    }


    /**
     * Display Student.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('student_view')) {
            return abort(401);
        }
        $student = Student::findOrFail($id);

        return view('admin.students.show', compact('student'));
    }


    /**
     * Remove Student from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('student_delete')) {
            return abort(401);
        }
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('admin.students.index');
    }

    /**
     * Delete all selected Student at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('student_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Student::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Student from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('student_delete')) {
            return abort(401);
        }
        $student = Student::onlyTrashed()->findOrFail($id);
        $student->restore();

        return redirect()->route('admin.students.index');
    }

    /**
     * Permanently delete Student from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('student_delete')) {
            return abort(401);
        }
        $student = Student::onlyTrashed()->findOrFail($id);
        $student->forceDelete();

        return redirect()->route('admin.students.index');
    }
    
}
