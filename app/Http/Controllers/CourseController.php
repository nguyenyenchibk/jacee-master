<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isTeacher')) {
            return view('pages.course.index')->with('course', Auth::user()->courses()->get());
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('isTeacher')) {
            return view('pages.course.create');
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        //
        $input = $request->validated();
        $course = Auth::user()->courses()->create($input);
        $course->save();
        return redirect()->route('courses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        if (Gate::allows('isTeacher') && auth()->user()->can('update', $course)) {
            return view('pages.course.edit', compact('course'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $input = $request->validated();
        $course->update($input);
        return view('pages.course.edit', compact('course'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if (Gate::allows('isTeacher') && auth()->user()->can('delete', $course)) {
            $course->delete($course);
            return redirect()->route('courses.index');
        } else {
            abort(403);
        }
    }

    public function all()
    {
        return view('pages.course.all')->with('course', Course::get()->all());
    }

    public function show(Course $course)
    {
        return view('pages.course.show', compact('course'));
    }

    public function createEnroll(Course $course)
    {
        return view('pages.course.create-enroll', compact('course'));
    }

    public function storeEnroll(Course $course)
    {
        $course->enrollments()->attach(Auth::user());
        return redirect()->route('courses.index');
    }
}
