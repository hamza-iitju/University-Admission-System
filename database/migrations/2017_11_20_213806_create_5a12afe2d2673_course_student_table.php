<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5a12afe2d2673CourseStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('course_student')) {
            Schema::create('course_student', function (Blueprint $table) {
                $table->integer('course_id')->unsigned()->nullable();
                $table->foreign('course_id', 'fk_p_91029_91033_student__5a12afe2d2772')->references('id')->on('courses')->onDelete('cascade');
                $table->integer('student_id')->unsigned()->nullable();
                $table->foreign('student_id', 'fk_p_91033_91029_course_5a12afe2d27f0')->references('id')->on('students')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_student');
    }
}
