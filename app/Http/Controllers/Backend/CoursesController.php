<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $courses= Course::all();
        return view('backend.courses.index', ['courses'=>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('backend.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CourseRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CourseRequest $request)
    {
        $course = new Course;
		$course->subject = $request->input('subject');
        $course->created_by = Auth::user()->id;
        $course->updated_by = Auth::user()->id;
        if(empty($request->input('status'))){
            $course->status = 0;
        }
        else{
            $course->status = 1;
        }
        $course->save();

        return to_route('backend.courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('backend.courses.show',['course'=>$course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('backend.courses.edit',['course'=>$course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CourseRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CourseRequest $request, $id)
    {
        $course = Course::findOrFail($id);
		$course->subject = $request->input('subject');
        if(empty($request->input('status'))){
            $course->status = 0;
        }
        else{
            $course->status = 1;
        }
        $course->save();

        return to_route('backend.courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return to_route('backend.courses.index');
    }
}
