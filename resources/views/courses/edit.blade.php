@extends('layouts.app')

@section('title')
    Update {{ $course->title }}
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

    <form action="{{ route('courses.update', $course->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mt-3">
            <label for="title">Tên Khóa Học</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $course->title) }}">
        </div>

        <div class="form-group mt-3">
            <label for="description">Mô tả</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $course->description) }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="introduction">Mô tả dài</label>
            <textarea name="introduction" id="introduction" class="form-control">{{ old('introduction', $course->introduction) }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="price">Giá khóa học</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $course->price) }}" min="0">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
        <a href="{{ route('courses.index') }}" class="btn btn-info mt-3">Quay lại danh sách</a>
    </form>
@endsection
