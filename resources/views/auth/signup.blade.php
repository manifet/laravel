@extends('layout')
@section('content')


@if($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
@endif
<form action="/auth/register" method="POST" class="needs-validation" novalidate>
    @csrf
    <div class="text-center mb-4">
        <h2 class="fw-bold">Create Your Account</h2>
        <p class="text-muted">Join us today - it takes just a minute</p>
    </div>

    <!-- Name Field -->
    <div class="mb-3">
        <label for="name" class="form-label">
            <i class="fas fa-user me-2"></i>Full Name
        </label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-id-card"></i>
            </span>
            <input type="text" class="form-control" id="name" name="name" 
                   placeholder="John Doe" required>
            <div class="invalid-feedback">
                Please provide your full name.
            </div>
        </div>
    </div>

    <!-- Email Field -->
    <div class="mb-3">
        <label for="email" class="form-label">
            <i class="fas fa-envelope me-2"></i>Email Address
        </label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-at"></i>
            </span>
            <input type="email" class="form-control" id="email" name="email" 
                   placeholder="your@email.com" required>
            <div class="invalid-feedback">
                Please provide a valid email address.
            </div>
        </div>
    </div>

    <!-- Password Field -->
    <div class="mb-3">
        <label for="password" class="form-label">
            <i class="fas fa-lock me-2"></i>Password
        </label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-key"></i>
            </span>
            <input type="password" class="form-control" id="password" name="password" 
                   placeholder="Create a password" required
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                   title="Must contain at least one number, one uppercase letter, and be at least 8 characters">
            <div class="invalid-feedback">
                Password must contain at least one number, one uppercase letter, and be 8+ characters.
            </div>
        </div>
        <div class="form-text">
            <small>Use 8+ characters with a mix of letters, numbers & symbols</small>
        </div>
    </div>


    <!-- Submit Button -->
    <div class="d-grid mb-3">
        <button type="submit" class="btn btn-primary btn-lg">
            <i class="fas fa-user-plus me-2"></i>Create Account
        </button>
    </div>

</form>

@endsection