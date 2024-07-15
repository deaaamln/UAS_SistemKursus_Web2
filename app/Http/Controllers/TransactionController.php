<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

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

        return view('thank', compact('course', 'schedules', 'user'));
    }
    public function store(Request $request)
    {
        try {
            $userId = Auth::id();
            $courseId = $request->input('course_id');

            $existingTransaction = Transaction::where('user_id', $userId)
                ->where('course_id', $courseId)
                ->first();

            if ($existingTransaction) {
                // Redirect back with an error message
                return redirect()->back()->with('error', 'You have already purchased this course.');
            }

            // Validate the incoming request data
            $validatedData = $request->validate([
                'user_id' => 'required|exists:users,id',
                'course_id' => 'required|exists:courses,id',
                'amount' => 'required|numeric',
                'transaction_date' => 'required|date',
                'status' => 'required|in:completed,incomplete',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
            ]);

            // Handle the image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('transaction_images', 'public');
                $validatedData['image'] = $imagePath;
            }

            // Create a new transaction instance
            $transaction = Transaction::create($validatedData);

            // Redirect the user to a thank you page or any other relevant page
            return redirect()->route('purchase');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
