<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('course')->get();
        return view('user.index', compact('users'));
    }

    public function new()
    {
        $courses = Course::all();
        return view('user.new', compact('courses'));
    }
}
