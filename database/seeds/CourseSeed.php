<?php

use Illuminate\Database\Seeder;

class CourseSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'Information Technology'],
            ['id' => 2, 'name' => 'Computer Science'],
            ['id' => 3, 'name' => 'Civil Engineering'],
            ['id' => 4, 'name' => 'Mechanical'],
            ['id' => 5, 'name' => 'Mathemetics'],
            ['id' => 6, 'name' => 'Bangla'],
            ['id' => 7, 'name' => 'English'],
            ['id' => 8, 'name' => 'IBA'],
        ];

        foreach ($items as $item) {
            \App\Course::create($item);
        }
    }
}