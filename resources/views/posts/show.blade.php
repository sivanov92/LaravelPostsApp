@extends('layouts.app')

@section('content')
  <div class="container border text-center mt-3" style="height:100%;width:70%;margin:auto;">
    <h1>Post #ID{{$post->id}}</h1>
    <h3>Post Name {{$post->title}}</h3>
    <p>{{$post->body}}</p>
     Categories:
  @if(count($categories)>0)   
    @for ($i = 0; $i < count($categories); $i++)
      <h5>{{$categories[$i]}}</h5> 
    @endfor
  @else
    <h5>No Category Selected</h5>
  @endif    
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
    <form action="{{route('posts.update',$post->id)}}" method="POST">
      @method('DELETE')
      @csrf
      <input class="mt-2 btn btn-primary"type="submit" value="Delete">
    </form>
  </div>
@endsection