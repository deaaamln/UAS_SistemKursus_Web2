<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/', [CourseController::class, 'index'])->name('welcome.index');



Route::get('/cart', function () {
    return view('keranjang');
})->name('cart');

Route::get('/purchasing', function () {
    return view('purchase');
})->name('purchase');


Route::get('/dashboard-admin', [CourseController::class, 'user'])->name('dashboard-admin');

Route::get('/add-course', [CourseController::class, 'indexadmin'])->name('add-course');

Route::post('/add-course', [CourseController::class, 'store'])->name('courses.store');
Route::get('/add-course/add-schedule', [CourseController::class, 'indexadmin'])->name('add-course');
Route::post('/add-course/add-schedule', [CourseController::class, 'addSchedule'])->name('courses.add-schedule');
Route::delete('/add-course/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.index');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/buyCourse/{id}', [CourseController::class, 'show'])->name('buy-course');
    Route::get('/transaction/{id}', [TransactionController::class, 'show'])->name('transaction');
    Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');

    Route::get('/my-courses', [CourseController::class, 'myCourses'])->name('courses.index');
    Route::get('/my-courses/{id}', [CourseController::class, 'show'])->name('courses.show');

    Route::get('/detailCourse/{id}', [CourseController::class, 'detail'])->name('detail-course');
    Route::get('/detailCourseWithSchedule/{id}', [CourseController::class, 'detailWithSchedule'])->name('detail-course-with-schedule');

});

require __DIR__ . '/auth.php';
