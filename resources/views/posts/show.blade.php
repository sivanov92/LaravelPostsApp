@extends('layouts.app')

@section('content')
  <div class="container border" style="height:100%;width:70%;margin:auto;"></div>
    <h1>Post {{$post->id}}</h1>
    <h3>Post Name {{$post->title}}</h3>
    <p>{{$post->body}}</p>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
  </div>
@endsection