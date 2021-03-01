<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('users', 'groups', 'students')->get();
        return view('course.index', compact('courses'));   
    }

    public function show($id)
    {
        $course = Course::with('users', 'groups', 'students')->find($id);
        return view('course.show', compact('course'));
    }

    public function new()
    {
        return view('course.new');
    }

    public function create(Request $request)
    {
        $course = new Course();
        $course->name = $request->name;
        if($course->save()) {
            return redirect()->route('course.index');
        }else {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $course = Course::with('users', 'groups', 'students')->find($id);
        if(
            count($course->users) == 0 &&
            count($course->groups) == 0 &&
            count($course->students) == 0
        ) {
            if($course->delete()) {
                return redirect()->route('course.index');
            }else {
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }
}
