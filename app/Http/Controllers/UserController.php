<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function courses()
    {
        if (auth()) {
            $user = auth()->user();
            if ($user->type == 'student') {
                $courses = $user->courses()->orderBy('created_at','DESC')->Paginate(12);
            } else {
                $courses = $user->teacher->courses()->orderBy('created_at','DESC')->with('category:id,title')->Paginate(12);
            }
            return view('my_courses', ['courses' => $courses, 'type' => $user->type]);
        }
    }

    public function enroll(Course $course)
    {
        if (auth() && Gate::allows('isStudent')) {
            (bool)$enrolled = auth()->user()->courses()->find($course->id);
            if (!$enrolled) {
                $course->students()->attach(auth()->user());
            }
        }
        return back();
    }

    public function unEnroll(Course $course)
    {
        if (auth() && Gate::allows('isStudent')) {
            (bool)$enrolled = auth()->user()->courses()->find($course->id);
            if ($enrolled) {
                $course->students()->detach(auth()->user());
            }
        }
        return back();
    }

    public function update(ProfileUpdateRequest $request){

        if (Hash::check($request['current_password'],Auth::user()->password) ){
            dd($request);
        }
    }


}
