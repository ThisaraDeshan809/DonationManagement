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
                            <th>Issuer Name</th>
                            <th>Product Name</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($issues as $issue )
                        <tr>
                            <td>{{$issue->Issuers->first_name}}</td>
                            <td>{{$issue->Products->name}}</td>
                            <td>{{$issue->amount}}</td>
                            <td>
                                <a href="{{route('Issue.Update.View',$issue->id)}}" class="btn btn-success btn-sm m-1">Update</a>
                                <a href="{{route('Issue.Delete',$issue->id)}}" class="btn btn-danger btn-sm m-1">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
