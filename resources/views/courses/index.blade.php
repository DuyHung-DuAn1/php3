@extends('layouts.app')
@section('title')
    Danh sách Khóa Học
@endsection

@section('content')
@if (session()->has('success'))
    <div class="alert alert-success">{{ session()->get('success') }}</div>
@endif

<a href="{{ route('courses.create') }}" class="btn btn-info mt-3">Thêm Khóa Học</a>

<table class="table mt-3" border="1">
    <tr>
        <th>STT</th>
        <th>Tên Khóa Học</th>
        <th>Mô Tả</th>
        <th>Mô Tả dai</th>
        <th>Gia</th>
        <th>Thao Tác</th>
    </tr>
    @foreach ($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->title }}</td>
            <td>{{ $course->description }}</td>
            <td>{{ $course->introduction }}</td>
            <td>{{ $course->price }}</td>
            <td>
                <a href="{{ route('courses.show', $course) }}" class="btn btn-info">Xem</a>
                <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning">Sửa</a>
                <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

{{ $courses->links() }}
@endsection