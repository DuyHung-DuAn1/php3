<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Trang chủ hiển thị danh sách khóa học
    public function index()
    {
        $newCourses = Course::orderBy('id', 'desc')->take(6)->get();
        $cheapCourses = Course::orderBy('price', 'asc')->take(6)->get(); 
        return view('home', compact('newCourses', 'cheapCourses'));
    }
    // Hiển thị chi tiết một khóa học
    public function show($id)
    {
        $course = Course::with('lessons')->findOrFail($id);
        return view('course.show', compact('course'));
    }
}
