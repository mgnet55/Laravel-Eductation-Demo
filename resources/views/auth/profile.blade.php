@extends('layouts.main')
@section('title')Profile @endsection
@section('content')

    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3">
                <img class="rounded-circle mt-5" width="150px"
                     src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="text-black-50">{{ucfirst(auth()->user()->type)}}</span>
                <span class="font-weight-bold"></span>{{auth()->user()->name}}
                <span class="text-black-50">{{auth()->user()->email}}</span>
            </div>
        </div>
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="" method="POST">
                @csrf
                <div class="p-3">
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Name</label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   class="form-control"
                                   placeholder="name"
                                   value="{{old('name') ?? auth()->user()->name}}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Current Password</label>
                            <input type="password"
                                   id="password"
                                   name="current_password"
                                   class="form-control"
                                   placeholder="Password">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">New Password</label>
                            <input type="password"
                                   id="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="New Password">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Confirm Password</label>
                            <input type="password"
                                   id="password"
                                   name="password_confirmation"
                                   class="form-control"
                                   placeholder="Re-Password">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
