@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Student
                    <span class="float-right">
                        <a href="{{ route('student.new') }}" class="btn btn-primary">NEW</a>
                    </span>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Facebook URL</th>
                                <th>Class</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone_no }}</td>
                                    <td>
                                        <a href="{{ $student->facebook }}" target="_blank">
                                            {{ $student->facebook }}
                                        </a>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($student->groups as $class)
                                                <li>
                                                    <a href="{{ route('class.show', ['id' => $class->id]) }}">{{ $class->name }}</a>
                                                    ( 
                                                        <a href="{{ route('course.show', ['id' => $class->course->id]) }}">
                                                            {{ $class->course->name }}
                                                        </a> 
                                                    )
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-danger" onclick="document.getElementById('student_{{$student->id}}').click()">Delete</a>
                                        <form action="{{ route('student.delete', ['id' => $student->id]) }}" method="POST">
                                            @csrf
                                            <input type="submit" id="student_{{$student->id}}" style="display: none;">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection