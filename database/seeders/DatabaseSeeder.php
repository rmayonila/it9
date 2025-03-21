<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run()
    {
        Student::create([
            'student_id' => '2024-0001',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'course' => 'Bachelor of Science in Information Technology',
            'year_level' => 3,
        ]);
    }
}