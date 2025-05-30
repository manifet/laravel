@extends('layout')
@section('content')


@if($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
@endif
<form action="/auth/authenticate" method="POST" class="needs-validation" novalidate>
    @csrf
    <div class="text-center mb-4">
        <h2 class="fw-bold">Welcome Back!</h2>
        <p class="text-muted">Please sign in to continue</p>
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
                   placeholder="Enter your password" required>
            <div class="invalid-feedback">
                Please enter your password.
            </div>
        </div>
    </div>


    <!-- Submit Button -->
    <div class="d-grid mb-3">
        <button type="submit" class="btn btn-primary btn-lg">
            <i class="fas fa-sign-in-alt me-2"></i>Sign In
        </button>
    </div>


</form>

@endsection