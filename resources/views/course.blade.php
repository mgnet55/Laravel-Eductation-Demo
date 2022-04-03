@extends('layouts.main')

@section('title')
    {{ $course->title }}
@endsection
@section('sub_title')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 mb-4">
            <p>
                <img src="{{ $course->image }}" alt="{{ $course->image }}" class="img-fluid">
            </p>
        </div>
        <div class="col-lg-5 ml-auto align-self-center">
            <h2 class="section-title-underline mb-5">
                <span>{{ $course->title }}</span>
            </h2>

            <p><strong class="text-black d-block">Category:</strong> {{ $course->category->title }}</p>
            <p><strong class="text-black d-block">Teacher:</strong> {{ $course->teacher->name }}</p>
            <p class="mb-5"><strong class="text-black d-block">Duration:</strong> {{ $course->duration }} hrs</p>
            <p>{{ $course->description }}</p>

            <p>
                @guest
                    <a class="btn btn-outline-dark rounded-0 btn-lg px-5 disabled">Enroll</a>
                    <span class="text-muted">Login to enroll</span>
                @endguest
                @auth
                    @if(auth()->user()->type=='teacher')
                        <a href="/courses/{{ $course->id }}/edit"
                           class="btn btn-primary rounded-0 btn-lg px-5">Edit</a>
            <form action="{{ route('courses.destroy',$course->id) }}" method="post">
                @csrf @method('delete')
                <button type="submit" class="btn btn-danger rounded-0 btn-lg px-5">Delete</button>
            </form>
            @elseif (!$enrolled)
                <a href="/courses/{{ $course->id }}/enroll"
                   class="btn btn-primary rounded-0 btn-lg px-5">Enroll</a>
            @else
                <a href="/courses/{{ $course->id }}/unenroll"
                   class="btn btn-danger rounded-0 btn-lg px-5">Unenroll</a>
                @endif
                @endauth

                </p>

        </div>

    </div>
    @auth
        <form class="form" action="{{ route('reviews.store', $course->id) }}" method="POST">
            @csrf
            <div class="input-group">
                <input class="form-control" name="comment" type="text">
                <button class="btn btn-outline-primary">Send Review</button>
            </div>
        </form>
    @endauth
    <div class="mt-3">
        @foreach ($course->reviews as $review)
            {{-- comment --}}
            <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="user d-flex flex-row align-items-center">
                        <img src="https://i.imgur.com/hczKIze.jpg" width="30" class="user-img rounded-circle mr-2">
                        <span>
                            <small class="font-weight-bold text-primary">{{ $review->user->name }}</small>
                            <small class="font-weight-bold">{{ $review->comment }}</small>
                        </span>
                    </div>
                    <small>{{ $review->created_at->diffForHumans() }}</small>
                </div>
            </div>
        @endforeach
    </div>
@endsection
