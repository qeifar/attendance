<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attend;
use App\Models\Group;

class AttendController extends Controller
{
    public function index()
    {
        $classes = Group::with('course')->get();
        return view('attend.index', compact('classes'));
    }

    public function class($id)
    {
        $class = Group::find($id);
        // $attends = Attend::with('student')->orderBy('class_time', 'DESC')->get();
        $byDateTime = Attend::select('class_time')->where('group_id', $id)->groupBy('class_time')->orderBy('class_time', 'DESC')->get();
        return view('attend.class', compact('class', 'byDateTime'));
    }

    public function new($id)
    {
        $class = Group::with('students')->find($id);
        return view('attend.new', compact('class'));
    }

    public function create(Request $request, $id)
    {
        $students = Group::with('students')->find($id)->students;
        $attendance = [];
        foreach ($students as $student) {
            if (isset($request->student[(string)$student->id])) {
                array_push($attendance, [
                    'student_id' => $student->id,
                    'group_id' => $id,
                    'attend' => true,
                    'class_time' => $request->date.' '.$request->time,
                ]);
            } else {
                array_push($attendance, [
                    'student_id' => $student->id,
                    'group_id' => $id,
                    'attend' => false,
                    'class_time' => $request->date.' '.$request->time,
                ]);
            }
        }
        if(Attend::insert($attendance)) {
            return redirect()->route('attend.class', ['id' => $id]);
        }else {
            return redirect()->back();
        }
    }
}
