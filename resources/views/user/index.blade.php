@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User</div>

                <div class="card-body">
                    @foreach ($users as $user)
                        <div class="col-12">{{ $user->name }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection