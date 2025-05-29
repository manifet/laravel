@extends('layout')
@section('content')

<h1 class="text-center mt-5">Comments</h1>
<div class="container">
<form action="/comment/{{$comment->id}}" method=POST  class="mb-3">
    @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Enter your title" value="{{$comment->title}}">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Text</label>
    <textarea type="text" class="form-control" id="text" name="text" placeholder="Your text">{{$comment->text}}</textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">update comment</button>
</form>
</div>
@endsection