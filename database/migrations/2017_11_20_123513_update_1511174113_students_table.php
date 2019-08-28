<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1511174113StudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            if(Schema::hasColumn('students', 'courses')) {
                $table->dropColumn('courses');
            }
            if (!Schema::hasColumn('students', 'image')) {
                $table->string('image');
                }
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
                        $table->string('academic_id')->nullable();
                $table->string('courses')->nullable();
                $table->dropColumn('logo');
                
        });

    }
}
