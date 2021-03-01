@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Class {{ $class->name }} </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Class Name</th>
                            <td>{{ $class->name }}</td>
                        </tr>
                        <tr>
                            <th>Course</th>
                            <td>{{ $class->course->name }}</td>
                        </tr>
                        <tr>
                            <th>Instructor</th>
                            <td>{{ $class->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Student List ( {{ count($class->students) }} ) </th>
                            <td>
                                <ul>
                                    @foreach ($class->students as $student)
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