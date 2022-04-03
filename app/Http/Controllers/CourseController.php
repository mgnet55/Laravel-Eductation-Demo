<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show','latest']);
    }

    public function index()
    {
        $courses = Course::with('category:id,title')->paginate(12);
        return view('courses', ['courses' => $courses]);
    }

    public function latest()
    {
        $courses = Course::limit(8)->orderby('id', 'desc')->with('category:id,title')->get();
        return view('home', ['courses' => $courses]);

    }

    public function create()
    {
        if (Gate::allows('isTeacher')) {
            return view('course_create',['categories'=>Category::all('id','title')]);
        } else {
            abort(403);
        }
    }


    public function store(CourseRequest $request)
    {
        if (Gate::allows('isTeacher')) {
            $course = $request->all();

            $course['teacher_id'] = Auth::id();
            Course::create($course);
            return back();
        } else {
            abort(403);
        }
    }

    public
    function show(Course $course)
    {
        if (auth()->user()) {
            (bool)$enrolled = auth()->user()->courses()->find($course->id);
        }
        $course = Course::with('teacher:id,name', 'category:id,title', 'reviews')->findOrFail($course->id);
        return view('course', ['course' => $course, 'enrolled' => $enrolled ?? false]);
    }

    public
    function edit(Course $course)
    {
        if (Gate::allows('isTeacher') && $course->teacher_id = Auth::id()) {
            return view('course_edit', ['course' => $course]);
        } else abort(403);
    }

    public
    function update(CourseRequest $request, Course $course)
    {
        if (Gate::allows('isTeacher') && $course->teacher_id = Auth::id()) {
            $course->update($request->all());
            return redirect()->route('courses.show', $course->id);
        } else abort(403);
    }

    public
    function destroy(Course $course)
    {
        if (Gate::allows('isTeacher') && $course->teacher_id = Auth::id()) {
            $course->deleteOrFail();
            return redirect('/my-courses');
        } else abort(403);

    }


}
