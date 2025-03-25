@extends('layouts.app')

@section('title', 'Chi tiết bài học')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Chi tiết bài học: {{ $lesson->title }}</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>Khóa học:</strong> {{ $lesson->course->title ?? 'Không xác định' }}</h5>
                <p class="card-text"><strong>Nội dung:</strong> {{ $lesson->content }}</p>

                @if ($lesson->image)
                    <p><strong>Hình ảnh:</strong></p>
                    <img src="{{ asset('storage/' . $lesson->image) }}" alt="Lesson Image" width="300px" class="mb-3">
                @endif

                <div class="mt-3">
                    <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
                    <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-warning">Sửa</a>

                    <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
