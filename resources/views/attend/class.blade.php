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
                    {{ $class }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection