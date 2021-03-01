<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Group;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('course', 'group')->get();
        return view('student.index', compact('students'));
    }

    public function new()
    {
        $courses = Course::all();
        $groups = Group::all();
        return view('student.new', compact('courses', 'groups'));
    }

    public function create(Request $request)
    {
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'facebook' => $request->facebook,
            'course_id' => $request->course_id,
            'group_id' => $request->group_id,
        ]);
        if($student) {
            return redirect()->route('student.index');
        }else {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $student = Student::find($id);
        if($student->delete()) {
            return redirect()->route('student.index');
        }else {
            return redirect()->back();
        }
    }
}
