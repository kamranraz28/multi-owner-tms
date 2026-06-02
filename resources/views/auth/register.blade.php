@extends('website.layouts.app')

@section('title', 'Register')

@section('content')
    <div class="common-container" style="max-width: 500px; margin: 40px auto;">
        <h2 class="text-center mb-4 fw-bold">Create Your Account</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST" class="card p-4 shadow-sm">
            @csrf

            @if($selectedPlan)
                <input type="hidden" name="plan_id" value="{{ $selectedPlan->id }}">
                <div class="alert alert-info text-center">
                    Selected Plan: <strong>{{ $selectedPlan->name }}</strong> (৳{{ number_format($selectedPlan->price) }}/month)
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label">Your Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Organization Name</label>
                <input type="text" name="org_name" class="form-control" value="{{ old('org_name') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100" style="background-color: {{ $buttonColor ?? '#1a56db' }};">
                Create Account
            </button>
        </form>

        <p class="text-center mt-3">
            Already have an account? <a href="{{ route('login') }}">Login</a>
        </p>
    </div>
@endsection
