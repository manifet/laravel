@extends('layout')
@section('content')


@if(session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif


<div class="card" style="width: 68rem;">
  <div class="card-body">
    <h5 class="card-title">{{$article->title}}</h5>
    <p class="card-text">{{App\Models\User::findOrFail($article->user_id)->name}}</p>
    <p class="card-text">{{$article->text}}</p>

    @can('update')
    <a class='btn btn-primary me-2' href="/article/{{$article->id}}/edit">Article edit</a>

    <form action="/article/{{$article->id}}" method='post'>
        @csrf
        @method("DELETE")
        <button type='submit' class="btn btn-danger" >Article delete</button>
    </form>
    </div>
    @endcan

 

<h1 class="text-center mt-5">Comments</h1>
<div class="container">
  @if(session('save'))
  <div class="alert  alert-success">
    <p>{{session('save')}}</p>
  </div>
  @endif
<form action="/comment" method=POST  class="mb-3">
    @csrf
    <input type="hidden" name="article_id" value="{{$article->id}}">
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Enter your title">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Text</label>
    <textarea type="text" class="form-control" id="text" name="text" placeholder="Your text"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Create comment</button>
</form>
</div>
@foreach($comments as $comment)
  <div class="card mb-1" style="width: 68rem;">
    <div class="card-body">
      <h5 class="card-title">{{$comment->title}}</h5>
      <h6 class="card-text">{{App\Models\User::findOrFail($comment->user_id)->name}}</h6>
      <p class="card-text">{{$comment->text}}</p>
      <div class='toolbar'>
        @can('comment', $comment)
      <a class='btn btn-primary me-2' href="/comment/{{$comment->id}}/edit">Comment edit</a>
      <a type='submit' class="btn btn-danger" href="/comment/{{$comment->id}}/delete">Comment delete</a>
      @endcan
    </div>

    </div>
  </div>
  
@endforeach
@endsection