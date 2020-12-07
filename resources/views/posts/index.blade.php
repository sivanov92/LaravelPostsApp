@extends('layouts.app')

@section('content')
    <h1 class="text-center display-4">Posts</h1>
    @if(count($posts)>0)
       @foreach ($posts as $post)
        <a href="/posts/{{$post->id}}">
        <div class="container border mt-3">
        <h3>{{$post->title}}</h3>
        <small>Written on {{$post->created_at}}</small>
        </div>
        </a>
       @endforeach
    @else

    @endif

@endsection