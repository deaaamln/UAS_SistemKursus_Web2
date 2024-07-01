<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('schedules')->get();
        foreach ($courses as $course) {
            foreach ($course->schedules as $schedule) {
                // Format the start date
                $startDate = date('D, H:i', strtotime($schedule->start_date));

                // Format the end date
                $endDate = date('D, H:i', strtotime($schedule->end_date));

                // Assign the formatted dates back to the schedule object
                $schedule->start_date = $startDate;
                $schedule->end_date = $endDate;
            }
        } // Mengambil semua kursus beserta jadwalnya
        $user = auth()->user();
        return view('welcome', compact('courses', 'user'));
    }
    public function show($id)
    {
        $course = Course::findOrFail($id); // Get the course
        $schedules = $course->schedules; // Get the schedules for the course

        // Check if schedules exist before formatting
        if ($schedules) {
            foreach ($schedules as $schedule) {
                $schedule->formatted_start_date = Carbon::parse($schedule->start_date)->format('D, H:i');
                $schedule->formatted_end_date = Carbon::parse($schedule->end_date)->format('D, H:i');
            }
        }

        $user = auth()->user();

        return view('buycourse', compact('course', 'schedules', 'user'));
    }
}
