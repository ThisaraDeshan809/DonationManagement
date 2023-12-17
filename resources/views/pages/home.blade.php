@extends('layouts.default')
@section('js')
<script src="{{asset('assets/js/pages/pieChart.js')}}"></script>
@endsection
@section('content')
    <div class="page-content">
        <div class="main-wrapper">
            <div class="row stats-row">
                <div class="col-lg-4 col-md-12">
                    <div class="card card-transparent stats-card">
                        <div class="card-body">
                            <div class="stats-info">
                                <h5 class="card-title">Top Products Donated<span class="stats-change stats-change-success">+16%</span></h5>
                                <canvas id="myChart" width="400" height="400"></canvas>
                            </div>
                            <div class="stats-icon change-success">
                                <i class="material-icons">trending_up</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card card-transparent stats-card">
                        <div class="card-body">
                            <div class="stats-info">
                                <h5 class="card-title">Top 5 Donators</h5>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Donator Name</th>
                                            <th>Donations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Thisara Deshan</td>
                                            <td>10</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="stats-icon change-success">
                                <i class="material-icons">trending_up</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card card-transparent stats-card">
                        <div class="card-body">
                            <div class="stats-info">
                                <h5 class="card-title">Low Stock Products</h5>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Pcs</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Laptop</td>
                                            <td>3</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="stats-icon change-success">
                                <i class="material-icons">trending_up</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
