@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">New Class</div>

                <div class="card-body">
                    <form action="{{ route('class.create') }}" method="POST">
                        @csrf
                        <table class="table">
                            <tr>
                                <th>Class Name</th>
                                <td>
                                    <input type="text" name="name" class="form-control">
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
                        </table>
                        <input type="submit" value="Create" class="btn btn-primary form-control">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection