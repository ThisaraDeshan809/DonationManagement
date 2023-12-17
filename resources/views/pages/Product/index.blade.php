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
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product )
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                                <a href="{{route('Product.Update.View',$product->id)}}" class="btn btn-success btn-sm m-1">Update</a>
                                <a href="{{route('Product.Delete',$product->id)}}" class="btn btn-danger btn-sm m-1">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
