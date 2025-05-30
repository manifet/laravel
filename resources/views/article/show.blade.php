@extends('layout')
@section('content')

@if(session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card shadow-sm border-0 mb-4">
  <div class="card-header bg-white">
    <div class="d-flex justify-content-between align-items-center">
      <h2 class="mb-0">
        <i class="fas fa-newspaper me-2 text-primary"></i>{{ $article->title }}
      </h2>
      @can('update', $article)
      <div class="btn-group">
        <a href="/article/{{$article->id}}/edit" class="btn btn-sm btn-outline-primary">
          <i class="fas fa-edit me-1"></i> Edit
        </a>
        <form action="/article/{{$article->id}}" method="POST">
          @csrf
          @method("DELETE")
          <button type="submit" class="btn btn-sm btn-outline-danger" 
                  onclick="return confirm('Are you sure you want to delete this article?')">
            <i class="fas fa-trash me-1"></i> Delete
          </button>
        </form>
      </div>
      @endcan
    </div>
  </div>
  
  <div class="card-body">
    <div class="d-flex align-items-center mb-4">
      <img src="https://ui-avatars.com/api/?name={{ urlencode(App\Models\User::findOrFail($article->user_id)->name) }}&background=random" 
           alt="Author" class="rounded-circle me-3" width="48" height="48">
      <div>
        <h6 class="mb-0">{{ App\Models\User::findOrFail($article->user_id)->name }}</h6>
        <small class="text-muted">Posted on {{ $article->created_at->format('M d, Y \a\t H:i') }}</small>
      </div>
    </div>
    
    <div class="article-content">
      {!! nl2br(e($article->text)) !!}
    </div>
  </div>
</div>

<div class="card shadow-sm border-0">
  <div class="card-header bg-white">
    <h3 class="mb-0">
      <i class="fas fa-comments me-2 text-primary"></i>Comments
    </h3>
  </div>
  
  <div class="card-body">
    @if(session('save'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="fas fa-check-circle me-2"></i>{{ session('save') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <form action="/comment" method="POST" class="mb-4">
      @csrf
      <input type="hidden" name="article_id" value="{{$article->id}}">
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter comment title" required>
      </div>
      <div class="mb-3">
        <label for="text" class="form-label">Comment</label>
        <textarea class="form-control" id="text" name="text" rows="3" placeholder="Write your comment here..." required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">
        <i class="fas fa-paper-plane me-1"></i> Submit Comment
      </button>
    </form>
    
    <div class="comments-list">
      @foreach($comments as $comment)
      <div class="card mb-3 border-0 shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start mb-2">
            <div class="d-flex align-items-center">
              <img src="https://ui-avatars.com/api/?name={{ urlencode(App\Models\User::findOrFail($comment->user_id)->name) }}&background=random" 
                   alt="Author" class="rounded-circle me-3" width="40" height="40">
              <div>
                <h6 class="mb-0">{{ App\Models\User::findOrFail($comment->user_id)->name }}</h6>
                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
              </div>
            </div>
            @can('comment', $comment)
            <div class="btn-group btn-group-sm">
              <a href="/comment/{{$comment->id}}/edit" class="btn btn-outline-secondary">
                <i class="fas fa-edit"></i>
              </a>
              <a href="/comment/{{$comment->id}}/delete" class="btn btn-outline-danger" 
                 onclick="return confirm('Are you sure you want to delete this comment?')">
                <i class="fas fa-trash"></i>
              </a>
            </div>
            @endcan
          </div>
          <h5 class="mt-2">{{ $comment->title }}</h5>
          <p class="mb-0">{!! nl2br(e($comment->text)) !!}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection