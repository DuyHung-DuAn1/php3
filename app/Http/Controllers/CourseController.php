<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Lesson;


use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    // Trang chủ hiển thị danh sách khóa học
    public function index()
    {
        $newCourses = Course::orderBy('id', 'desc')->take(6)->get();
        $cheapCourses = Course::orderBy('price', 'asc')->take(6)->get(); 
        return view('home', compact('newCourses', 'cheapCourses'));
    }
    public function create()
    {
       
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
       
    }

    public function edit(Course $product)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $product)
    {
       
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $product)
    {
       
    }


    // Hiển thị chi tiết một khóa học
    public function show($id)
    {
        $course = Course::with('lessons')->findOrFail($id);
        return view('course.show', compact('course'));
    }
}
