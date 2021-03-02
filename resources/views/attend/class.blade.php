@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Class {{ $class->name }} attendance
                    <span class="float-right">
                        <a href="{{ route('attend.new', ['id' => $class->id]) }}" class="btn btn-primary">NEW</a>
                    </span>
                </div>

                <div class="card-body">
                    <table class="table">
                        @foreach ($byDateTime as $dateTime)
                            <tr>
                                <td>
                                    <a href="#">{{ date('d M Y (H:i a)', strtotime($dateTime->class_time)) }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection