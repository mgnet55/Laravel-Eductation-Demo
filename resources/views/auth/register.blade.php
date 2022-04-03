@extends('layouts.main')
@section('title')Register @endsection
@section('content')
        <div class="row justify-content-center">
            <div class="col-md-5">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required class="form-control form-control-lg" value="{{old('name')}}">
                    </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required class="form-control form-control-lg"
                                   value="{{old('email')}}">
                    </div>
                        <div class="col-md-12 form-group">
                            <label>Password</label>
                            <input type="password" name="password" required autocomplete="new-password"
                                   class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword2">Re-type Password</label>
                            <input type="password" id="pword2" name="password_confirmation" required
                                   class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="role">Role</label>
                            <select id="role" name="type" required class="form-control form-control-lg">
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                            </select>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Register" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
