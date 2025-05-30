@extends('layout')
@section('content')
@if(session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card shadow-sm border-0">
  <div class="card-header bg-white d-flex justify-content-between align-items-center">
    <h5 class="mb-0">
      <i class="fas fa-newspaper me-2 text-primary"></i>Articles
    </h5>
    @can('create')
    <a href="/article/create" class="btn btn-sm btn-primary">
      <i class="fas fa-plus me-1"></i> New Article
    </a>
    @endcan
  </div>
  
  <div class="table-responsive">
    <table class="table table-hover mb-0">
      <thead class="table-light">
        <tr>
          <th scope="col" class="w-15">Date</th>
          <th scope="col" class="w-20">Title</th>
          <th scope="col" class="w-45">Content Preview</th>
          <th scope="col" class="w-20">Author</th>
        </tr>
      </thead>
      <tbody>
        @foreach($articles as $article)
        <tr>
          <td class="text-nowrap">
            <small class="text-muted">{{ \Carbon\Carbon::parse($article->date_print)->format('M d, Y') }}</small>
          </td>
          <td>
            <a href="/article/{{$article->id}}" class="text-decoration-none">
              <strong>{{ $article->title }}</strong>
            </a>
            <div class="d-flex gap-2 mt-1">
              <a href="/article/{{$article->id}}/edit" class="btn btn-sm btn-outline-secondary py-0 px-2">
                <i class="fas fa-edit fa-xs"></i>
              </a>
              <form action="/article/{{$article->id}}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger py-0 px-2" 
                        onclick="return confirm('Are you sure you want to delete this article?')">
                  <i class="fas fa-trash fa-xs"></i>
                </button>
              </form>
            </div>
          </td>
          <td class="text-truncate" style="max-width: 300px;">
            {{ Str::limit(strip_tags($article->text), 100) }}
          </td>
          <td>
            <div class="d-flex align-items-center">
              <div class="flex-shrink-0">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(App\Models\User::findOrFail($article->user_id)->name) }}&background=random" 
                     alt="Author" class="rounded-circle" width="30" height="30">
              </div>
              <div class="flex-grow-1 ms-2">
                {{ App\Models\User::findOrFail($article->user_id)->name }}
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
  @if($articles->isEmpty())
  <div class="card-body text-center py-5">
    <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
    <h5 class="text-muted">No articles found</h5>
    @can('create')
    <a href="/article/create" class="btn btn-primary mt-3">
      <i class="fas fa-plus me-1"></i> Create First Article
    </a>
    @endcan
  </div>
  @endif
  
  @if($articles->hasPages())
  <div class="card-footer bg-white">
    {{ $articles->links() }}
  </div>
  @endif
</div>
@endsection