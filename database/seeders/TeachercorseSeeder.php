<?php

namespace Database\Seeders;

use App\Models\teacher;
use App\Models\teachercorse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeachercorseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $teacherscourses = [
            ['teacher_id' => 1, 'course_id' => 1],
            ['teacher_id' => 2, 'course_id' => 1],
            ['teacher_id' => 2, 'course_id' => 3],
            ['teacher_id' => 3, 'course_id' => 2],
            ['teacher_id' => 3, 'course_id' => 4],
            ['teacher_id' => 4, 'course_id' => 2],  
        ];

        foreach ($teacherscourses as $teacherscourse) {
            
            teachercorse::create($teacherscourse);
        }
    }
}