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
        return $request;
    }
}
