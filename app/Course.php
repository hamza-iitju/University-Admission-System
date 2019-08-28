<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Course
 *
 * @package App
 * @property string $name
*/
class Course extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student');
    }
    
    public static function courses()
    {
        return static::pluck('name', 'id');
    }
    
}
