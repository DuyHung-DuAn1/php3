<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CourseController::class, 'index'])->name('home');




Route::get('/course/{id}', [CourseController::class, 'show'])->name('course.show');


Route::resource('products',ProductController::class);
Route::resource('lessons',LessonController::class);

