<?php

namespace Database\Seeders;

use App\Models\teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_Teachers = [
            [
                'username' => 'gary cabrera',
                'mobile' => '0912345678',
            ],
            [
                'username' => 'james vance',
                'mobile' => '0987654321',
            ],
            [
                'username' => 'alica vance',
                'mobile' => '0911223344',
            ],
            [
                'username' => 'averie cartre',
                'mobile' => '0998877665',
            ]
        ];
        foreach ($all_Teachers as $teacher) {
            teacher::create($teacher);
        }
    }
}