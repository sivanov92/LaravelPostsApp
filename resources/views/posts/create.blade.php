@extends('layouts.app')

@section('content')
<form action="{{route('posts.store')}}" method="POST">
   @csrf
   <div class='form-group' style="width: 50%;margin:auto;">
    <h2>Create Post</h2>
    <input type="text" name="title" id="title" placeholder="Post Title" class="form-control">
    <h4>Select Categories</h4>
    @foreach ($categories as $category)
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <input type="checkbox" name="CatId.{{$category->id}}" aria-label="Checkbox for following text input">        
        </div>
      </div>
      <input type="text" class="form-control" value="{{$category->name}}" aria-label="Text input with checkbox">
    </div>
    @endforeach
    <textarea name="body" class = "form-control" id="body" cols="30" rows="10" placeholder=Post Body""></textarea>
    <input type="submit" value="Send" class="btn btn-primary">
    </div>
 </form>
@endsection