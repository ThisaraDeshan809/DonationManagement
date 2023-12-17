@extends('layouts.default')
@section('js')
<script src="{{asset('assets/js/pages/pieChart.js')}}"></script>
@endsection
@section('content')
    <div class="page-content">
        <div class="main-wrapper">
            <div class="row stats-row">
                <h3>Issues</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Donator Name</th>
                            <th>Product Name</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donations as $donation )
                        <tr>
                            <td>{{$donation->Users->first_name}}</td>
                            <td>{{$donation->Products->name}}</td>
                            <td>{{$donation->amount}}</td>
                            <td>
                                <a href="{{route('Donation.update.view',$donation->id)}}" class="btn btn-success btn-sm m-1">Update</a>
                                <a href="{{route('Donation.delete',$donation->id)}}" class="btn btn-danger btn-sm m-1">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
