@extends('layout')
@section('content')


@if($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
@endif
<form action="/article" method="POST" class="needs-validation" novalidate>
    @csrf
    
    <div class="text-center mb-4">
        <h2 class="fw-bold text-primary"><i class="fas fa-plus-circle me-2"></i>Create New Article</h2>
        <p class="text-muted">Fill in the details to publish your article</p>
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
            <input type="date" class="form-control shadow-sm" id="date" name="date_print" required>
            <div class="invalid-feedback">
                Please select a publication date.
            </div>
        </div>
        <div class="form-text">
            When should this article be published?
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
                   placeholder="Enter a compelling title..." required>
            <div class="invalid-feedback">
                Please provide an article title.
            </div>
        </div>
        <div class="form-text">
            <small id="titleHelp">Make it attention-grabbing! (60-70 characters ideal)</small>
            <span class="float-end"><span id="titleCounter">0</span>/70</span>
        </div>
    </div>

    <!-- Content Field -->
    <div class="mb-4">
        <label for="text" class="form-label fw-bold">
            <i class="fas fa-align-left me-2"></i>Article Content
        </label>
        <div class="input-group has-validation">
            <textarea class="form-control shadow-sm" id="text" name="text" rows="10" 
                      placeholder="Write your amazing content here..." required></textarea>
            <div class="invalid-feedback">
                Article content cannot be empty.
            </div>
        </div>
        <div class="form-text d-flex justify-content-between">
            <small>Supports <a href="#" class="text-decoration-none">Markdown formatting</a></small>
            <span><span id="contentCounter">0</span>/5000 characters</span>
        </div>
    </div>

    <!-- Form Actions -->
    <div class="d-flex justify-content-between mt-4 border-top pt-3">
        <button type="reset" class="btn btn-outline-secondary">
            <i class="fas fa-eraser me-2"></i>Reset Form
        </button>
        <div>
            <a href="/article" class="btn btn-outline-danger me-2">
                <i class="fas fa-times me-2"></i>Cancel
            </a>
            <button type="submit" class="btn btn-primary px-4">
                <i class="fas fa-paper-plane me-2"></i>Publish Article
            </button>
        </div>
    </div>
</form>

@endsection