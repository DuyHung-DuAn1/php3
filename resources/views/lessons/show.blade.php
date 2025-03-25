@extends('layouts.app')

@section('title', 'Chi tiết khóa học')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Chi tiết khóa học: {{ $course->title }}</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>Tên khóa học:</strong> {{ $course->title }}</h5>
                <p class="card-text"><strong>Mô tả:</strong> {{ $course->description }}</p>
                <p class="card-text"><strong>Mô tả dai:</strong> {{ $course->introduction }}</p>
                <p class="card-text"><strong>Gia:</strong> {{ $course->price }}</p>



                <div class="mt-3">
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Sửa</a>

                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection