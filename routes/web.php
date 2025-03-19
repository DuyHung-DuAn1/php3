<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

// Trang chủ hiển thị danh sách khóa học
Route::get('/', [CourseController::class, 'index'])->name('home');

// Hiển thị chi tiết một khóa học
Route::get('/course/{id}', [CourseController::class, 'show'])->name('course.show');
