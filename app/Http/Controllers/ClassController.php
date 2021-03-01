<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Group::with('course', 'students')->get();
        return view('class.index', compact('classes'));
    }
}
