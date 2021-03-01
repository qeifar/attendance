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
        $students = Student::with('courses', 'groups')->get();
        return view('student.index', compact('students'));
    }

    public function new()
    {
        $courses = Course::with('groups')->get();
        return view('student.new', compact('courses'));
    }

    public function create(Request $request)
    {
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'facebook' => $request->facebook,
        ]);
        if($student) {
            $course_id = [];
            foreach ($request->group_id as $group_id) {
                $group = Group::find($group_id);
                array_push($course_id, $group->course_id);
            }
            $student->groups()->attach($request->group_id);
            $student->courses()->attach($course_id);
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
