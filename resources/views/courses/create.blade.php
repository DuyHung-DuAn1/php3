@extends('layouts.app')
@section('title')
    Thêm mới khóa học
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

    <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
        @csrf
    
        <div class="form-group mt-3">
            <label for="title">Tên Khóa Học</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="form-group mt-3">
            <label for="description">Mô tả</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>     
        <div class="form-group mt-3">
            <label for="introduction">Mô tả dai</label>
            <textarea name="introduction" id="introduction" class="form-control">{{ old('introduction') }}</textarea>
        </div>      
        <div class="form-group mt-3">
            <label for="price">Gia Khóa Học</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}">
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
        <a href="{{ route('courses.index') }}" class="btn btn-info mt-3">Back to list</a>
    </form>
@endsection
