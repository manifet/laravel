@extends('layout')
@section('content')


@if($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
@endif
<form action="/article/{{$article->id}}" method=POST>
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="date" class="form-label">Date print</label>
    <input type="date" class="form-control" id="date" name="date_print" value="{{$article->date_print}}">
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="title" class="form-control" id="title" name="title" placeholder="Enter your title" value="{{$article->title}}">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">your text</label>
    <textarea type="text" class="form-control" id="text" name="text"placeholder="Enter your text">{{$article->text}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update article</button>
</form>

@endsection