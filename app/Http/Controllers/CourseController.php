<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('users', 'groups')->get();
        return view('course.index', compact('courses'));   
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
}
