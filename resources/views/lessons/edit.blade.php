@extends('layouts.app')

@section('title')
    Update {{ $lesson->title }}
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger mt-3 mb-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif

    <form action="{{ route('lessons.update', $lesson->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Chọn Course --}}
        <div class="form-group mt-3">
            <label for="course_id">Course</label>
            <select name="course_id" id="course_id" class="form-control">
                @foreach ($courses as $id => $title)
                    <option value="{{ $id }}" @if($lesson->course_id == $id) selected @endif>
                        {{ $title }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Nhập Title --}}
        <div class="form-group mt-3">
            <label for="title">Lesson Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $lesson->title }}">
        </div>

        {{-- Chọn Ảnh --}}
        <div class="form-group mt-3">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($lesson->image)
                <img src="{{ asset('storage/' . $lesson->image) }}" width="100px" alt="Lesson Image">
            @endif
        </div>

        {{-- Nội dung bài học --}}
        <div class="form-group mt-3">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control">{{ $lesson->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('lessons.index') }}" class="btn btn-info mt-3">Back to list</a>
    </form>
@endsection
