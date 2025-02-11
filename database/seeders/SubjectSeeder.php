<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Manually create 5 subjects
        $subjects = [
            [
                'subject_name' => 'Matematika',
                'description' => 'Pelajaran yang berkaitan dengan angka dan menghitung.',
            ],
            [
                'subject_name' => 'Fisika',
                'description' => 'Pelajaran tentang energi dan berkaitan dengan hukum alam',
            ],
            [
                'subject_name' => 'Kimia',
                'description' => 'Pelajaran tentang senyawa dan zat',
            ],
            [
                'subject_name' => 'Biologi',
                'description' => 'Pelajaran tentang makhluk hidup dan cara mereka hidup.',
            ],
            [
                'subject_name' => 'Bahasa Inggris',
                'description' => 'Pelajaran yang mempelajari Bahasa Inggris dan literatur dalam Bahasa Inggris.',
            ],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
