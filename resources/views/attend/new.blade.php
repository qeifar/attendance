@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Class {{ $class->name }} attendance</div>

                <div class="card-body">
                    <form action="{{ route('attend.create', ['id' => $class->id]) }}" method="POST">
                        @csrf
                        <table class="table">
                            <tr>
                                <th>Date</th>
                                <td><input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}"></td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td><input type="time" name="time" class="form-control" value="{{ date('H:i') }}"></td>
                            </tr>
                            <tr>
                                <th>Student List</th>
                                <td>
                                    <table class="table">
                                        @foreach ($class->students as $student)
                                            <tr>
                                                <td style="width: 20px">
                                                    <input type="checkbox" name="student[{{ $student->id }}]">
                                                </td>
                                                <td>{{ $student->name }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" value="Create" class="form-control btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection