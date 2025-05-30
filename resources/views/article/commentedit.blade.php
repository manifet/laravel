@extends('layout')
@section('content')


@if($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
@endif
<form action="/article/{{$article->id}}" method="POST" class="needs-validation" novalidate>
    @csrf
    @method('PUT')
    
    <div class="text-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="fas fa-edit me-2"></i>Edit Article
        </h2>
        <p class="text-muted">Update your article details below</p>
    </div>

    <!-- Date Field -->
    <div class="mb-4">
        <label for="date" class="form-label fw-bold">
            <i class="far fa-calendar-alt me-2"></i>Publication Date
        </label>
        <div class="input-group has-validation">
            <span class="input-group-text bg-light">
                <i class="fas fa-calendar-day text-primary"></i>
            </span>
            <input type="date" class="form-control shadow-sm" id="date" name="date_print" 
                   value="{{ $article->date_print }}" required>
            <div class="invalid-feedback">
                Please select a valid publication date.
            </div>
        </div>
    </div>

    <!-- Title Field -->
    <div class="mb-4">
        <label for="title" class="form-label fw-bold">
            <i class="fas fa-heading me-2"></i>Article Title
        </label>
        <div class="input-group has-validation">
            <span class="input-group-text bg-light">
                <i class="fas fa-pen text-primary"></i>
            </span>
            <input type="text" class="form-control shadow-sm" id="title" name="title" 
                   placeholder="Enter article title" value="{{ $article->title }}" required>
            <div class="invalid-feedback">
                Please provide an article title.
            </div>
        </div>
        <div class="form-text">
            <small id="titleHelp">Current length: <span id="titleCounter">{{ strlen($article->title) }}</span> characters</small>
        </div>
    </div>

    <!-- Content Field -->
    <div class="mb-4">
        <label for="text" class="form-label fw-bold">
            <i class="fas fa-align-left me-2"></i>Article Content
        </label>
        <textarea class="form-control shadow-sm" id="text" name="text" rows="10"
                  placeholder="Write your content here..." required>{{ $article->text }}</textarea>
        <div class="invalid-feedback">
            Article content cannot be empty.
        </div>
        <div class="form-text d-flex justify-content-between">
            <small>Supports <a href="#" class="text-decoration-none">Markdown formatting</a></small>
            <span><span id="contentCounter">{{ strlen($article->text) }}</span> characters</span>
        </div>
    </div>

    <!-- Form Actions -->
    <div class="d-flex justify-content-between mt-4 border-top pt-3">
        <a href="/article/{{$article->id}}" class="btn btn-outline-secondary">
            <i class="fas fa-times me-2"></i>Cancel
        </a>
        <div>
            <button type="submit" class="btn btn-primary px-4">
                <i class="fas fa-save me-2"></i>Update Article
            </button>
        </div>
    </div>
</form>
@endsection