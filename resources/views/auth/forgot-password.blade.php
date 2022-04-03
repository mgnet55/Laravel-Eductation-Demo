@extends('layouts.main')
@section('title')Forgot Password @endsection
@section('content')

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

    <form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
        <div class="col-md-12 form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control form-control-lg">
        </div>

        <div class="col-12">
                <input type="submit" value="Send reset mail" class="btn btn-primary btn-lg px-5">
        </div>
    </form>
@endsection
