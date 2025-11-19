<?php

namespace Database\Seeders;

use App\Models\student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            ['username' => 'student1', 'mobile' => '0987654321'],
            ['username' => 'student2', 'mobile' => '0987654321'],
            ['username' => 'student3', 'mobile' => '0987654321'],
        ];
        foreach ($students as $student) {
            student::create($student);
        }
    }
}