@extends('layouts.default')
@section('content')
    <div class="page-content">
        <div class="main-wrapper">
            <div class="row stats-row">
                <div class="col-lg-4 col-md-12">
                    <div class="card card-transparent stats-card">
                        <div class="card-body">
                            <div class="stats-info">
                                <h2 class="mt-4 mb-4">Top Products Donated</h2>
                                <div class="chart-container">
                                    <!-- Bar Chart Items -->
                                    <div class="bar" style="width: 80%;">Product A - 80</div>
                                    <div class="bar" style="width: 70%;">Product B - 70</div>
                                    <div class="bar" style="width: 60%;">Product C - 60</div>
                                    <div class="bar" style="width: 50%;">Product D - 50</div>
                                    <div class="bar" style="width: 40%;">Product E - 40</div>
                                </div>
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
                                <h5 class="card-title">168,047<span class="stats-change stats-change-success">+16%</span>
                                </h5>
                                <p class="stats-text">Unique visitors in current period</p>
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
                                <h5 class="card-title">47,350<span class="stats-change stats-change-success">+12%</span>
                                </h5>
                                <p class="stats-text">Total investments in this month</p>
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
