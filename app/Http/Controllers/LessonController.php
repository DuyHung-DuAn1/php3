<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Models\Course;

use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;



use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function index()
    {
        $data = Lesson::with('course')->latest('id')->paginate(5);
        return view('lessons.index', compact('data'));
    }
    
    public function create()
    {
        $data = Course::pluck('title','id')->all();
        return view('lessons.create' , compact('data'));
       
    }

  public function store(StoreLessonRequest $request){
    try {
        $lesson = DB::transaction(function () use ($request) {
            $dataLesson = [
                "course_id" => $request->course_id,
                "title" => $request->title,
                "content" => $request->content
            ];

            if ($request->hasFile('image')) {
                $dataLesson['image'] = Storage::put('lessons', $request->file('image'));
            }

            return Lesson::create($dataLesson);
        });

        return redirect()->route('lessons.index')->with('success', 'Bài học đã được tạo thành công!');

    } catch (\Throwable $th) {
        return back()->with('error', $th->getMessage());
    }
}


public function edit(Lesson $lesson)
{
    $lesson->load('course'); // Tải quan hệ 'course'
    $courses = Course::pluck('title', 'id'); // Lấy danh sách khóa học

    return view('lessons.edit', compact('lesson', 'courses'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        try {
            DB::transaction(function () use ($request, $lesson) {
                $dataLesson = [
                    "course_id" => $request->course_id,
                    "title" => $request->title,
                    "content" => $request->content
                ];
                
                if ($request->hasFile('image')) {
                    $dataLesson['image'] = Storage::put('lessons', $request->file('image'));
                }
    
                $lesson->update($dataLesson);
            });
    
            return back()->with('success', 'Sửa thành công');
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        try {
            $imagePath = $lesson->image; // Lưu đường dẫn ảnh trước khi xóa bài học
    
            DB::transaction(function () use ($lesson) {
                $lesson->delete();
            });
    
            // Xóa ảnh sau khi bài học đã bị xóa thành công
            if ($imagePath && Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
    
            return redirect()->route('lessons.index')->with('success', 'Xóa bài học thành công!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Lỗi: ' . $th->getMessage());
        }
    }
    

    public function show($id)
    {
        $lesson = Lesson::with('course')->findOrFail($id);
        return view('lessons.show', compact('lesson'));
    }
    
}
