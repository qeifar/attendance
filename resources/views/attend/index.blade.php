@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Please select class:</div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            @foreach ($classes as $class)
                                @if ($class->course->id == auth()->user()->course_id)
                                    <tr>
                                        <td>
                                            <a href="{{ route('attend.class', ['id' => $class->id]) }}">{{ $class->name }}</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection