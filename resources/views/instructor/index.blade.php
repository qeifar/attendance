@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Instructor
                    <span class="float-right">
                        <a href="{{ route('instructor.new') }}" class="btn btn-primary">NEW</a>
                    </span>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('course.show', ['id' => $user->course->id]) }}">
                                            {{ $user->course->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-danger" onclick="document.getElementById('user_{{$user->id}}').click()">Delete</a>
                                        <form action="{{ route('instructor.delete', ['id' => $user->id]) }}" method="POST">
                                            @csrf
                                            <input type="submit" id="user_{{$user->id}}" style="display: none;">
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