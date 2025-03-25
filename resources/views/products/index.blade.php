@extends('master')
@section('title')
    List Product
@endsection

@section('content')
@if (session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif
<a href="{{route('products.create')}}" class="btn btn-info mt-3">Create</a>
    <table class="table">
        <tr>
            <th>STT</th>
            <th>Category</th>
            <th>Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
            <th>Tags</th>
            <th>Others</th>
        </tr>
        @foreach ($data as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->name}}</td>
                <td>
                    <img src="{{ asset('storage/' . $product->image_path) }}" width="100px" alt="Product Image">

                </td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>
                    @foreach ($product->tags as $tag   )
                       <span class="badge bg-info">{{$tag->name}}</span>
                    @endforeach
                </td>

                <td>
                    <a href="{{route('products.edit', $product)}}" class="btn btn-warning mt-3">Sua</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Có chắc không?')" class="btn btn-danger mt-3">Xóa</button>
                    </form>
                    
                </td>
            </tr>
        @endforeach
    </table>

    {{$data -> links()}}
@endsection
