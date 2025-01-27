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
                'subject_name' => 'Mathematics',
                'description' => 'The study of numbers, shapes, and patterns.',
            ],
            [
                'subject_name' => 'Physics',
                'description' => 'The study of matter, energy, and the laws of nature.',
            ],
            [
                'subject_name' => 'Chemistry',
                'description' => 'The study of substances, their properties, and reactions.',
            ],
            [
                'subject_name' => 'Biology',
                'description' => 'The study of living organisms and their life processes.',
            ],
            [
                'subject_name' => 'English',
                'description' => 'The study of the English language, grammar, and literature.',
            ],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
