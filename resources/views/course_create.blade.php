@extends('layouts.main')

@section('title')
    New Course
@endsection
@section('sub_title')
@endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action={{ route('courses.store') }} method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="title">Title</label>
                <input name="title" type="text" id="title" value="{{ old('title') }}"
                       class="form-control form-control-lg">
            </div>
            <div class="col-md-6 form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category_id" class="form-control form-control-lg">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="duration">Duration</label>
                <input name="duration" type="number" id="duration" value="{{ old('duration') }}"
                       class="form-control form-control-lg">
            </div>
            <div class="col-md-6 form-group">
                <label for="image">Image link</label>
                <input type="text" id="image" name="image" value="{{ old('image') }}"
                       class="form-control form-control-lg">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <label for="description">Description</label>
                <input name="description" type="text" id="description" value="{{ old('description') }}"
                       class="form-control form-control-lg">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <label for="content">content</label>
                <textarea name="content" id="content" cols="30" rows="8"
                          class="form-control">{{ old('content') }}</textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <input type="submit" value="Create" class="btn btn-primary btn-lg px-5">
            </div>
        </div>
    </form>
@endsection
