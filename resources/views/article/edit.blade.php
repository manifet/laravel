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
        <h2 class="fw-bold"><i class="fas fa-edit me-2"></i>Edit Article</h2>
        <p class="text-muted">Update your article details below</p>
    </div>

    <!-- Date Field -->
    <div class="mb-4">
        <label for="date" class="form-label">
            <i class="far fa-calendar-alt me-2"></i>Publication Date
        </label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-calendar-day"></i>
            </span>
            <input type="date" class="form-control" id="date" name="date_print" 
                   value="{{$article->date_print}}" required>
            <div class="invalid-feedback">
                Please select a valid date.
            </div>
        </div>
    </div>

    <!-- Title Field -->
    <div class="mb-4">
        <label for="title" class="form-label">
            <i class="fas fa-heading me-2"></i>Article Title
        </label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-pen"></i>
            </span>
            <input type="text" class="form-control" id="title" name="title" 
                   placeholder="Enter article title" value="{{$article->title}}" required>
            <div class="invalid-feedback">
                Please provide a title for your article.
            </div>
        </div>
    </div>

    <!-- Text Content Field -->
    <div class="mb-4">
        <label for="text" class="form-label">
            <i class="fas fa-align-left me-2"></i>Article Content
        </label>
        <textarea class="form-control" id="text" name="text" rows="8" 
                  placeholder="Write your article content here..." required>{{$article->text}}</textarea>
        <div class="invalid-feedback">
            Article content cannot be empty.
        </div>
        <div class="form-text">
            <small>Supports <a href="#" class="text-decoration-none">Markdown formatting</a></small>
        </div>
    </div>

    <!-- Form Actions -->
    <div class="d-flex justify-content-between mt-4">
        <a href="/article/{{$article->id}}" class="btn btn-outline-secondary">
            <i class="fas fa-times me-2"></i>Cancel
        </a>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-2"></i>Update Article
        </button>
    </div>
</form>

@endsection