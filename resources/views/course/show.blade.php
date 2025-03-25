@extends('layouts.app')

@section('title', $course->title)

@section('content')
<div class="container">

    <a href="{{route('lessons.index')}}" class="btn btn-info mt-3">Chi tiet bai hoc</a>
    <h1>{{ $course->title }}</h1>
    <p>{{ $course->description }}</p>
    <p><strong>Giới thiệu:</strong> {{ $course->introduction }}</p>
    <p><strong>Giá:</strong> ${{ $course->price }}</p>
  


    <a href="{{ url('/') }}" class="btn btn-secondary mt-3">← Back to List</a>
</div>
@endsection