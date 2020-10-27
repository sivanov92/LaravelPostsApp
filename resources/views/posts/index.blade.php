@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts)>0)
       @foreach ($posts as $post)
        <a href="/posts/{{$post->id}}">
        <div class="container border">
        <h3>{{$post->title}}</h3>
        <small>Written on {{$post->created_at}}</small>
        </div>
        </a>
       @endforeach
    @else

    @endif

@endsection