<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Course::create([
            'title' => 'Web Dev Zero to Hero',
            'description' => 'This is course how to learn Development',
            'price' => 100000,
            'image' => 'images/1xrQOq36p6zPdouBO2vfpygFFZylxEGTO1XNHyAa.png',
        ]);

        Course::create([
            'title' => 'Make Uber Clone App',
            'description' => 'Lets make Uber Clone App with me.',
            'price' => 200000,
            'image' => 'images/mhRWu61liTz9FymO042NyKMn6nw8RN4pSSOjm1nB.png',
        ]);
    }
}
