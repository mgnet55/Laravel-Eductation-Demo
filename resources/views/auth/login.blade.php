@extends('layouts.main')
@section('title')Login @endsection
@section('content')
    <div class="row justify-content-center">

        <div class="col-md-5">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="username" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="pword">Password</label>
                        <input type="password" name="password" id="pword" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Log In" class="btn btn-primary btn-lg px-5">
                        <a href="{{ route('password.request') }}" class="btn btn-outline-primary btn-lg px-5">forgot?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
