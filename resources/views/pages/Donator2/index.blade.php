@extends('layouts.default')
@section('js')
<script src="{{asset('assets/js/pages/pieChart.js')}}"></script>
@endsection
@section('content')
    <div class="page-content">
        <div class="main-wrapper">
            <div class="row stats-row">
                <h3>Donators</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Donator First Name</th>
                            <th>Donator Last Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donators as $donator )
                        <tr>
                            <td>{{$donator->first_name}}</td>
                            <td>{{$donator->last_name}}</td>
                            <td>{{$donator->email}}</td>
                            <td>
                                <a href="{{route('Donator.delete',$donator->id)}}" class="btn btn-danger btn-sm m-1">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
