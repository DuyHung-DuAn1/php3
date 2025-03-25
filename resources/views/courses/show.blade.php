@extends('layouts.app')

@section('title', $course->title)

@section('content')
<div class="container">

    <a href="{{route('courses.index')}}" class="btn btn-info mt-3">Chi tiet bai hoc</a>
    <h1>{{ $course->title }}</h1>
    <p>{{ $course->description }}</p>
    <p><strong>Giới thiệu:</strong> {{ $course->introduction }}</p>
    <p><strong>Giá:</strong> ${{ $course->price }}</p>

    <td>
        <a href="{{ route('courses.show', $course) }}" class="btn btn-info mt-3">Xem</a>
        <a href="{{route('courses.edit', $course)}}" class="btn btn-warning mt-3">Sua</a>
        <form action="{{ route('courses.destroy', $course) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Có chắc không?')" class="btn btn-danger mt-3">Xóa</button>
        </form>
        
    </td>
  


    <a href="{{ url('/') }}" class="btn btn-secondary mt-3">← Back to List</a>
</div>
@endsection