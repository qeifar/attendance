<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;

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

    public function create(Request $request)
    {
        if($request->password == $request->password_confirm) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'course_id' => $request->course_id,
            ]);
            if($user) {
                return redirect()->route('user.index');
            }else {
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }
}
