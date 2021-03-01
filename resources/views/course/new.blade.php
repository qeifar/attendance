@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">New Course</div>

                <div class="card-body">
                    <form action="{{ route('course.create') }}" method="POST">
                        @csrf
                        Course Name: <br>
                        <input type="text" name="name" class="form-control">
                        <hr>
                        <input type="submit" value="Create" class="form-control btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection