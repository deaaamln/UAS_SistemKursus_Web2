<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function myCourses()
    {
        $user = Auth::user();
        $courses = $user->courses;
        $schedules = [];

        // Iterate over each course to get its schedules
        foreach ($courses as $course) {
            // Get the schedules for the current course
            $courseSchedules = $course->schedules;

            // Check if schedules exist for the current course
            if ($courseSchedules) {
                foreach ($courseSchedules as $schedule) {
                    // Format start and end dates for each schedule
                    $schedule->formatted_start_date = Carbon::parse($schedule->start_date)->format('D, H:i');
                    $schedule->formatted_end_date = Carbon::parse($schedule->end_date)->format('D, H:i');
                }

                // Store the schedules for the current course
                $schedules[$course->id] = $courseSchedules;
            }
        }
        return view('courseuser', compact('courses', 'schedules', 'user'));
    }
    public function user()
    {
        $users = User::where('role', 'user')->withCount('courses')->get();
        $userCount = User::where('role', 'user')->count();
        $courseCount = Course::count();

        return view('admin.dashboard', ['userCount' => $userCount, 'users' => $users, 'courseCount' => $courseCount]);
    }
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

    public function indexadmin()
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
        return view('admin.course', compact('courses'));
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Create a new course instance
        $course = Course::create($validatedData);

        // Redirect to a specific route or return a response
        return redirect()->route('add-course')->with('success', 'Course added successfully.');
    }
    public function addSchedule(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'course_id' => 'required|exists:courses,id',
                'start_date' => 'required|date_format:Y-m-d H:i',
                'end_date' => 'required|date_format:Y-m-d H:i|after:start_date',
            ]);

            // Find the course
            $course = Course::findOrFail($validatedData['course_id']);

            // Add the schedule to the course
            $schedule = new Schedule([
                'start_date' => $validatedData['start_date'],
                'end_date' => $validatedData['end_date'],
            ]);

            $course->schedules()->save($schedule);

            return redirect()->route('courses.add-schedule')->with('success', 'Schedule added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('add-course')->with('success', 'Course and associated schedules deleted successfully.');
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

    public function detail($id)
    {
        $user = Auth::user();
        $course = Course::findOrFail($id);

        return view('coursdetail', compact('course', 'user'));
    }

    public function detailWithSchedule($id)
    {
        $course = Course::findOrFail($id);

        if ($course->schedules()->exists()) {
            // Check if the schedule has started
            $firstSchedule = $course->schedules()->orderBy('start_date')->first();

            if (Carbon::now()->isBefore($firstSchedule->start_date)) {
                // Schedule has not started, redirect back with an error message
                return redirect()->back()->with('error', 'The schedule for this course has not started yet.');
            }
        }
        $user = auth()->user();

        return view('coursdetail', compact('course', 'user'));
    }
}
