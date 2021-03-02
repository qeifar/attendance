@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Class {{ $class->name }}
                    <span class="float-right">
                        {{ date('d M Y (H:i a)', strtotime($datetime)) }}
                    </span>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Attends</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attends as $attend)
                                <tr>
                                    <td>{{ $attend->student->name }}</td>
                                    <td>{{ $attend->student->email }}</td>
                                    <td>
                                        {!! 
                                            $attend->attend ? 
                                            "<span class='text-success'>Yes</span>" : 
                                            "<span class='text-danger'>No</span>"
                                        !!}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="2" class="text-right">Total: </th>
                                <th>{{ $total }} / {{ count($attends) }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection