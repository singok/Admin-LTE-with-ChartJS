<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
});

Route::prefix('admin')->group( function () {
    Route::get('student', function () {
        return view('student.student');
    })->name('student.list');

    Route::get('student-list', [StudentController::class, 'list'])->name('student.getdata');
});