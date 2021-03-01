<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Course;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Group::with('course', 'students')->get();
        return view('class.index', compact('classes'));
    }

    public function new()
    {
        $courses = Course::all();
        return view('class.new', compact('courses'));
    }

    public function create(Request $request)
    {
        $class = Group::create([
            'name' => $request->name,
            'course_id' => $request->course_id,
        ]);
        if($class) {
            return redirect()->route('class.index');
        }else {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $class = Group::with('course', 'students')->find($id);
        if(count($class->students) == 0) {
            if($class->delete()) {
                return redirect()->route('class.index');
            }else {
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }
}
