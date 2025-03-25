@extends('layouts.app')
@section('title')
    List Khóa Học
@endsection

@section('content')
@if (session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif
<a href="{{route('lessons.create')}}" class="btn btn-info mt-3">Create</a>
    <table class="table" border="">
        <tr>
            <th>STT</th>
            <th>Course</th>
            <th>Title</th>
            <th>Image</th>
            <th>Content</th>
       
            <th>Others</th>
        </tr>
        @foreach ($data as $lesson)
            <tr>
                <td>{{$lesson->id}}</td>
                <td>{{ $lesson->course->title ?? 'Không có khóa học' }}</td>

                <td>{{$lesson->title}}</td>
                <td>
                    <img src="{{ asset('storage/' . $lesson->image) }}" width="100px" alt="Product Image">

                </td>
                <td>{{$lesson->content}}</td>
            

                <td>
                    <a href="{{ route('lessons.show', $lesson) }}" class="btn btn-info mt-3">Xem</a>
                    <a href="{{route('lessons.edit', $lesson)}}" class="btn btn-warning mt-3">Sua</a>
                    <form action="{{ route('lessons.destroy', $lesson) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Có chắc không?')" class="btn btn-danger mt-3">Xóa</button>
                    </form>
                    <a href="{{ url('/') }}" class="btn btn-secondary mt-3">← Back to List</a>
                    
                </td>
            </tr>
        @endforeach
    </table>

    {{$data -> links()}}
@endsection
