@extends('admin/layout')

@section('content')
<!-- Layout Content Start-->
<div class=" container-fluid">

<div class="row" style="justify-content: space-around;">
        <div class="col-md-3 col-sm-12 col-lg-2 dashboard-card border-left-dark card">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between;">
                    <h4 class="card-title font-weight-bold" >Customers </h4>
                    <i style="font-size: 20px;" class="fa fa-users ml-4"></i>
                </div>
                <h3 class="text-right">20</h3>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 col-lg-2 card dashboard-card border-left-danger">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between;">
                    <h4 class="card-title font-weight-bold">Total <br> Users </h4>
                    <i style="font-size: 20px;" class="fa fa-suitcase ml-4"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-lg-2 card dashboard-card border-left-info">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between;">
                    <h4 class="card-title font-weight-bold">Total <br> Locations </h4>
                    <i style="font-size: 20px;" class="fa fa-calendar ml-4"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 col-lg-2 card dashboard-card border-left-primary">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between;">
                    <h4 class="card-title font-weight-bold">Total <br> Sites </h4>
                    <i style="font-size: 20px;" class="fa fa-suitcase ml-1"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row p-2">

        <!-- <div class="col-xl-6 col-lg-6"> -->

        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold" style="color: #0f172b;">Monthly Revenue</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>

                </div>
            </div>
        </div>

        <!-- Bar Chart -->
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card shadow ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold" style="color: #0f172b;">Monthly Expenses</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- </div> -->


    </div>

</div>

<!-- Layout Content End-->


@endSection

