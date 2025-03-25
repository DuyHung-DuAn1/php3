<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    public function index()
    {
        $newCourses = Course::orderBy('id', 'desc')->take(6)->get();
        $cheapCourses = Course::orderBy('price', 'asc')->take(6)->get(); 
        $courses = Course::latest('id')->paginate(5);
        return view('home', compact('courses','newCourses','cheapCourses'));
    }
    
    public function create()
    {
        return view('courses.create');
    }
    public function store(StoreCourseRequest $request)
    {
        try {
            $course = DB::transaction(function () use ($request) {
                $dataCourse = [
                    "title" => $request->title,
                    "description" => $request->description,
                    "introduction" => $request->introduction,
                    "price" => $request->price
                ];
                return Course::create($dataCourse);
            });
    
            return redirect()->route('courses.index')->with('success', 'Khóa học đã được tạo thành công!');

        } catch (\Throwable $th) {
            dd($th->getMessage()); // In lỗi cụ thể ra màn hình
            return back()->with('error', 'Lỗi: ' . $th->getMessage());
        }
    }
    
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }
    
    public function update(UpdateCourseRequest $request, Course $course)
    {
        try {
            // Kiểm tra dữ liệu đầu vào (debug nếu cần)
            if ($request->price < 0) {
                return back()->with('error', 'Giá không thể nhỏ hơn 0!');
            }
    
            // Cập nhật dữ liệu khóa học
            $course->update([
                "title" => $request->title,
                "description" => $request->description,
                "introduction" => $request->introduction,
                "price" => $request->price
            ]);
    
            return redirect()->route('courses.index');
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }
    
    
    public function destroy(Course $course)
    {
        try {
            $imagePath = $course->image;
            
            DB::transaction(function () use ($course) {
                $course->delete();
            });
            
            
            return redirect()->route('courses.index')->with('success', 'Xóa khóa học thành công!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Lỗi: ' . $th->getMessage());
        }
    }
    
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }
}
