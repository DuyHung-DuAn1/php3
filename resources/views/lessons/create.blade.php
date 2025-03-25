@extends('layouts.app')
@section('title')
    Thêm mới bài học
@endsection

@section('content')
    @if ($errors->any())
    <div class="alert alert-danger mt-3 mb-3">
        <ul>
            @foreach ($errors->all() as $error )
            <li>{{$error}}</li>
            
            @endforeach
        </ul>
    </div>
    
    @endif

    <form action="{{route('lessons.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    
        <div class="form-group mt-3">
            <label for="course_id">Course</label>
            <select name="course_id" id="course_id" class="form-control">
                @foreach ($data as $id => $title )
                <option value="{{ $id }}">{{ $title }}</option>
                
                @endforeach
            </select>
        </div>
    
        <div class="form-group mt-3">
            <label for="title">Tên Bài Học</label>
            <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
        </div>
    
        <div class="form-group mt-3">
            <label for="image">Hình ảnh</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
    
        <div class="form-group mt-3">
            <label for="content">Content</label>
            <input type="text" name="content" id="content" class="form-control" value="{{old('content')}}">
        </div>         
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
        <a href="{{route('lessons.index')}} "  class="btn btn-info mt-3" >Back to list</a>
    </form>
    
@endsection