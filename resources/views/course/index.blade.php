@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Course
                    <span class="float-right">
                        <a href="{{ route('course.new') }}" class="btn btn-primary">NEW</a>
                    </span>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Instructor Count</th>
                                <th>Class Count</th>
                                <th>Student Count</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ count($course->users) }}</td>
                                    <td>{{ count($course->groups) }}</td>
                                    <td>{{ count($course->students) }}</td>
                                    <td>
                                        @if (
                                            count($course->users) == 0 &&
                                            count($course->groups) == 0 &&
                                            count($course->students) == 0
                                        )
                                            <a href="#" class="btn btn-danger" onclick="document.getElementById('course_{{$course->id}}').click()">Delete</a>
                                            <form action="{{ route('course.delete', ['id' => $course->id]) }}" method="POST">
                                                @csrf
                                                <input type="submit" id="course_{{$course->id}}" style="display: none;">
                                            </form>
                                        @endif
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