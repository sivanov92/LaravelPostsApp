@extends('layouts.app')

@section('content')
<form action="{{route('categories.store')}}" method="POST">
   @csrf
   <div class='form-group' style="width: 50%;margin:auto;">
    <h2>Create Category</h2>
    <input type="text" name="name" id="title" placeholder="Post Title" class="form-control">
    <input type="submit" value="Send" class="btn btn-primary">
    </div>
 </form>
@endsection