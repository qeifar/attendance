@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">New User</div>

                <div class="card-body">
                    <form action="{{ route('user.create') }}" method="POST">
                        @csrf
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>
                                    <input type="text" name="name" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>
                                    <input type="email" name="email" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <th>Course</th>
                                <td>
                                    <select name="course_id" class="form-control">
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td>
                                    <input type="password" name="password" class="form-control" placeholder="New password"> <br>
                                    <input type="password" name="password_confirm" class="form-control" placeholder="Confirm Password">
                                </td>
                            </tr>
                        </table>
                        <input type="submit" class="btn btn-primary form-control" value="Create">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection