@extends('layouts.main')

@section('title')
    Home
@endsection
@section('sub_title')
    Latest Courses
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="owl-slide-3 owl-carousel">

                @foreach ($courses as $course)
                    <div class="course-1-item">
                        <figure class="thumnail">
                            <a href="course-single.html"><img src="{{ $course->image }}" alt="Image"
                                    class="img-fluid"></a>
                            <div class="price">{{ $course->duration }} hrs</div>
                            <div class="category">
                                <h3>{{ $course->category->title }}</h3>
                            </div>
                        </figure>
                        <div class="course-1-content pb-4">
                            <h2>{{ $course->title }}</h2>
                            <p class="desc mb-4">{{ $course->description }}.</p>
                            <p><a href="/courses/{{ $course->id }}" class="btn btn-primary rounded-0 px-4">Details</a></p>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
@endsection
