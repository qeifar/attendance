@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Course {{ $course->name }}</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Course Name</th>
                            <td>{{ $course->name }}</td>
                        </tr>
                        <tr>
                            <th>Instructor</th>
                            <td>
                                <ul>
                                    @foreach ($course->users as $user)
                                        <li>{{ $user->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Class</th>
                            <td>
                                <ul>
                                    @foreach ($course->groups as $class)
                                        <li>{{ $class->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Student</th>
                            <td>
                                <ul>
                                    @foreach ($course->students as $student)
                                        <li>{{ $student->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection