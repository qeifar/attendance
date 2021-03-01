@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">New Student</div>

                <div class="card-body">
                    <form action="{{ route('student.create') }}" method="POST">
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
                                <th>Phone Number</th>
                                <td>
                                    <input type="text" name="phone_no" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <th>Facebook URL</th>
                                <td>
                                    <input type="text" name="facebook" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <th>Class</th>
                                <td>
                                    @foreach ($courses as $course)
                                        {{ $course->name }} <br>
                                        <ul>
                                            @foreach ($course->groups as $class)
                                                <li style="list-style-type: none;">
                                                    <input type="checkbox" name="group_id[]" value="{{ $class->id }}"> {{ $class->name }} <br>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                        <input type="submit" value="Create" class="btn btn-primary form-control">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection