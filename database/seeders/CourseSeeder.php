<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Tutor;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'teacher_name' => 'عبد الرحمن',
            'book_name' => 'كتاب داتا بيز',
            'subject' => "مادة داتا بيز 4 ساعات",
            'room_number' => "K404",
        ]);
    }
}
