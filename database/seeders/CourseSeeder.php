<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;


class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            ['title' => 'English'],
            ['title' => 'French'],
            ['title' => 'ICDL'],
            ['title' => 'Communication Skills'],
        ];
        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}