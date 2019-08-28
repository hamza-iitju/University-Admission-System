<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Student;
use Illuminate\Http\Request;

/**
 * Class Student
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $contact
 * @property string $ssc_gpa
 * @property string $hsc_diploma_gpa
 * @property string $address
 * @property string $image
*/
class Student extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'contact', 'ssc_gpa', 'hsc_diploma_gpa', 'address', 'image'];
    
    public function getImageUrl(){
        return asset($this->image);
    }
    

    /**
     * Set to null if empty
     * @param $input
     */
    
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student')->withTrashed();
    }

    public function scopeFilterByRequest($query, Request $request)
    {
        
        if ($request->input('courses')) {
            $query->whereHas('courses',
            function ($query) use ($request) {
                $query->where('id', $request->input('courses'));
            });
        }
        
        if ($request->input('search')) {
            $query->where('name', 'LIKE', '%'.$request->input('search').'%');
        }

        return $query;
    }
    
}
