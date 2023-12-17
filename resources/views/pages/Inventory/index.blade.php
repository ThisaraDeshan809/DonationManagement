@extends('layouts.default')
@section('js')
<script src="{{asset('assets/js/pages/pieChart.js')}}"></script>
@endsection
@section('content')
    <div class="page-content">
        <div class="main-wrapper">
            <div class="row stats-row">
                <h3>Inventories</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Inventories as $Inventory )
                        <tr>
                            <td>{{$Inventory->Products->name}}</td>
                            <td>{{$Inventory->quantity}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
