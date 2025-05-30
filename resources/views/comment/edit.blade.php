@extends('layout')
@section('content')

<div class="card shadow-sm border-0 mx-auto" style="max-width: 800px;">
  <div class="card-header bg-white">
    <h3 class="mb-0">
      <i class="fas fa-edit me-2 text-primary"></i>Edit Comment
    </h3>
  </div>
  
  <div class="card-body">
    <form action="/comment/{{$comment->id}}" method="POST">
      @csrf
      @method('PUT')
      
      <div class="mb-4">
        <label for="title" class="form-label fw-bold">Title</label>
        <input type="text" class="form-control form-control-lg" id="title" name="title" 
               placeholder="Enter comment title" value="{{ old('title', $comment->title) }}" required>
        @error('title')
          <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
      </div>
      
      <div class="mb-4">
        <label for="text" class="form-label fw-bold">Comment</label>
        <textarea class="form-control" id="text" name="text" rows="5" 
                  placeholder="Write your comment here..." required>{{ old('text', $comment->text) }}</textarea>
        @error('text')
          <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
      </div>
      
      <div class="d-flex justify-content-between align-items-center">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
          <i class="fas fa-arrow-left me-1"></i> Cancel
        </a>
        <button type="submit" class="btn btn-primary px-4">
          <i class="fas fa-save me-1"></i> Update Comment
        </button>
      </div>
    </form>
  </div>
</div>

@endsection