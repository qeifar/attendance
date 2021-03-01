@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Class
                    <span class="float-right">
                        <a href="{{ route('class.new') }}" class="btn btn-primary">NEW</a>
                    </span>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Class Name</th>
                                <th>Course</th>
                                <th>Student Count</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                                <tr>
                                    <td>{{ $class->name }}</td>
                                    <td>{{ $class->course->name }}</td>
                                    <td>{{ count($class->students) }}</td>
                                    <td>
                                        @if (count($class->students) == 0)
                                            <a href="#" class="btn btn-danger" onclick="document.getElementById('class_{{$class->id}}').click()">Delete</a>
                                            <form action="{{ route('class.delete', ['id' => $class->id]) }}" method="POST">
                                                @csrf
                                                <input type="submit" id="class_{{$class->id}}" style="display: none;">
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