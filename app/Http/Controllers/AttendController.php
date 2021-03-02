<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class AttendController extends Controller
{
    public function index()
    {
        $classes = Group::with('course')->get();
        return view('attend.index', compact('classes'));
    }
}
