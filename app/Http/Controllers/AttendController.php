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
        $attends = Attend::with('students')->get();
        // return $attends;
        return view('attend.class', compact('class'));
    }

    public function new($id)
    {
        $class = Group::with('students')->find($id);
        return view('attend.new', compact('class'));
    }
}
