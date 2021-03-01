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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ count($course->users) }}</td>
                                    <td>{{ count($course->groups) }}</td>
                                    <td>{{ count($course->students) }}</td>
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