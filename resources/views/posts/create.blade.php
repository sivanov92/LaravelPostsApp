@extends('layouts.app')

@section('content')
<form action="{{route('posts.store')}}" method="POST">
   @csrf
   <div class='form-group' style="width: 50%;margin:auto;">
    <h2>Create Post</h2>
    <input type="text" name="title" id="title" placeholder="Post Title" class="form-control">
    <textarea name="body" class = "form-control" id="body" cols="30" rows="10" placeholder=Post Body""></textarea>
    <input type="submit" value="Send" class="btn btn-primary">
    </div>
 </form>
@endsection