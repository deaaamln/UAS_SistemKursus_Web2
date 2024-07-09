<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/', [CourseController::class, 'index'])->name('welcome.index');
Route::get('/purchasing', function () {
    return view('purchase');
})->name('purchase');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.index');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/buyCourse/{id}', [CourseController::class, 'show'])->name('buy-course');
    Route::get('/transaction/{id}', [TransactionController::class, 'show'])->name('transaction');
    Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
});

require __DIR__ . '/auth.php';
