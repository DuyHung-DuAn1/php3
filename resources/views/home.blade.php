@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
<h2>Khóa học mới nhất</h2>
<div class="row">
    @foreach($newCourses as $course)
        <div class="col-md-4 mb-4">
            <div class="card p-3">
                <h3>{{ $course->title }}</h3>
                <p>{{ $course->description }}</p>
                <p><strong>Giá: </strong>${{ number_format($course->price, 2) }}</p>
                <a href="{{ url('course/'.$course->id) }}" class="btn btn-primary">Xem chi tiết</a>
            </div>
        </div>
    @endforeach
</div>

<h2 class="mt-5">Khóa học giá thấp</h2>
<div class="row">
    @foreach($cheapCourses as $course)
        <div class="col-md-4 mb-4">
            <div class="card p-3">
                <h3>{{ $course->title }}</h3>
                <p>{{ $course->description }}</p>
                <p><strong>Giá: </strong>${{ number_format($course->price, 2) }}</p>
                <a href="{{ url('course/'.$course->id) }}" class="btn btn-primary">Xem chi tiết</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
