@extends('master')
@section('title')
    Update {{$product->name}}
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
    @if (session()->has('success'))
    <div class="alert alert-success">{{session()->get('success')}}</div>
    @endif
    <form action="{{route('products.update' , $product)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="form-group mt-3">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $id => $name )
                <option 
                @selected($product->category_id == $id)
                value="{{ $id }}">{{ $name }}</option>
                
                @endforeach
            </select>
        </div>
    
        <div class="form-group mt-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$product->name}}">
        </div>
    
        <div class="form-group mt-3">
            <label for="image_path">Image</label>
            <input type="file" name="image_path" id="image_path" class="form-control">
            <img src="{{ asset('storage/' . $product->image_path) }}" width="100px" alt="Product Image">
        </div>
    
        <div class="form-group mt-3">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{$product->price}}">
        </div>
    
        <div class="form-group mt-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{$product->description}}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="tags">Tags</label>
            <select name="tags[]" id="tags" class="form-control" multiple>
                @foreach ($tags as $id => $name)
                    <option 
                    @selected(in_array($id , $productTags));
                    
                    value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="galleries">Galleries</label> <br>
            @foreach ($product->galleries as $item)
                <img src="{{ asset('storage/' . $item->image_path) }}" width="100px" class="m-2" alt="Gallery Image">
            @endforeach
        </div>
        <div class="form-group mt-3">
            <label for="galleries">Upload Galleries</label>
            <input type="file" name="galleries[]" class="form-control" multiple>
        </div>
        
        
     
    
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
        <a href="{{route('products.index')}} "  class="btn btn-info mt-3" >Back to list</a>
    </form>
    
@endsection