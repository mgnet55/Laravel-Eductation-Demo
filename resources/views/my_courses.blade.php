@extends('layouts.main')

@section('title')
    My Courses
@endsection
@section('sub_title')@endsection
@section('content')
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-lg-3 col-md-3 mb-2">
                <div class="course-1-item">
                    <figure class="thumnail">
                        <a href="course-single.html"><img src="{{ $course->image }}" alt="Image" class="img-fluid"></a>
                        <div class="price">{{ $course->duration }} hrs</div>
                        <div class="category">
                            <h3>{{ $course->category->title }}</h3>
                        </div>
                    </figure>
                    <div class="course-1-content pb-4">
                        <h2>{{ $course->title }}</h2>
                        <p class="desc mb-4">{{ $course->description }}.</p>
                        <p><a href="/courses/{{ $course->id }}" class="btn btn-primary rounded-0 px-4">Details</a></p>
                        @can('isStudent')
                            <p><a href="/courses/{{ $course->id }}/unenroll" class="btn btn-danger rounded-0 px-4">Unenroll</a></p>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    {{$courses->render('pagination::bootstrap-5')}}

@endsection
