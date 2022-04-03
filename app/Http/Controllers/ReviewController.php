<?php

namespace App\Http\Controllers;
use App\Models\Review;
use App\Models\Course;
use App\Http\Requests\ReviewRequest;

//use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index(Review $review)
    {
        return $review;
    }

    public function create()
    {
        //
    }

    public function store(ReviewRequest $request,Course $course)
    {
        $review = $request->all();
        $review['user_id'] = auth()->user()->id;
        $review['course_id'] = $course->id;

        Review::create($review);
        return back();
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {

    }

    public function update(ReviewRequest $request,Review $review)
    {
        $comment->update($request->all());
    }

    public function destroy(Review $review)
    {
        $comment->deleteOrFail();
        return back();
    }
}
