@extends('layouts.app')

@section('content')
<form action="{{route('posts.update',$post->id)}}" method="POST">
   @method('PUT')
   @csrf
   <div class='form-group' style="width: 50%;margin:auto;">
    <h2>Update Post</h2>
   <input type="text" name="title" id="title" placeholder="{{$post->title}}" class="form-control">
   <textarea name="body" class = "form-control" id="body" cols="30" rows="10" placeholder="{{$post->body}}"></textarea>
   <script>
      CKEDITOR.replace( 'body' );
</script>

    <input type="submit" value="Send" class="btn btn-primary">
    </div>
 </form>
@endsection