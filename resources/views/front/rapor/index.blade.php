@extends('layouts.app')
@section('content')
    <div class="row page-title clearfix">
        <div class="page-title-left">
            <h6 class="page-title-heading mr-0 mr-r-5">Raporlar</h6>
        </div>
        <!-- /.page-title-left -->
        <div class="page-title-right d-none d-sm-inline-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Panel</a>
                </li>
                <li class="breadcrumb-item active">Raporlar</li>
            </ol>

        </div>
        <!-- /.page-title-right -->
    </div>

    <div class="widget-list">
        <div class="row">
            <div class="col-md-12 widget-holder" style="margin-bottom: 10px;">
                <div class="widget-bg">
                    <div class="widget-body clearfix">
                        <h5 class="box-title">Bar Chart</h5>
                        <div class="" style="height: 240px">
                            <canvas id="chartJsBarMiddleAxes"></canvas>
                        </div>
                    </div>
                    <!-- /.widget-body -->
                </div>
                <!-- /.widget-bg -->
            </div>
        </div>
    </div>




    @endsection
@section('footer')
    <script>
        barMiddleAxesChartJs: function() {
            var ctx = document.getElementById("chartJsBarMiddleAxes");
            if ( ctx === null ) return;

            var ctx2 = document.getElementById("chartJsBarMiddleAxes").getContext("2d");
            var data2 = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "My First dataset2",
                        backgroundColor: "#5867c3",
                        strokeColor: "#5867c3",
                        data: [16, -60, 30, -50, 26, -55, 55]
                    },
                    {
                        label: "My Second dataset",
                        backgroundColor: "#00cedc",
                        strokeColor: "#00cedc",
                        data: [-28, 48, -40, 19, -55, 27, -50]
                    }
                ]
            };

            var chartJsBar = new Chart(ctx2, {
                type: "bar",
                data: data2,
                responsive: true,
                maintainAspectRatio: false,
                options: {
                    legend: {
                        display: false
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                        titleFontColor: "#000",
                        titleMarginBottom: 10,
                        backgroundColor: "rgba(255,255,255,.9)",
                        bodyFontColor: "#000",
                        borderColor: "#e9e9e9",
                        bodySpacing: 10,
                        borderWidth: 3,
                        xPadding: 10,
                        yPadding: 10,
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display:false
                            },
                            ticks: {
                                fontColor: "#9ca0a8",
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display:true
                            },
                            ticks: {
                                fontColor: "#9ca0a8",
                            }
                        }]
                    }
                },
            });
        },
        barMiddleAxesChartJs: function() {
            var ctx = document.getElementById("chartJsBarMiddleAxes");
            if ( ctx === null ) return;

            var ctx2 = document.getElementById("chartJsBarMiddleAxes").getContext("2d");
            var data2 = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "My First dataset2",
                        backgroundColor: "#5867c3",
                        strokeColor: "#5867c3",
                        data: [16, -60, 30, -50, 26, -55, 55]
                    },
                    {
                        label: "My Second dataset",
                        backgroundColor: "#00cedc",
                        strokeColor: "#00cedc",
                        data: [-28, 48, -40, 19, -55, 27, -50]
                    }
                ]
            };

            var chartJsBar = new Chart(ctx2, {
                type: "bar",
                data: data2,
                responsive: true,
                maintainAspectRatio: false,
                options: {
                    legend: {
                        display: false
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                        titleFontColor: "#000",
                        titleMarginBottom: 10,
                        backgroundColor: "rgba(255,255,255,.9)",
                        bodyFontColor: "#000",
                        borderColor: "#e9e9e9",
                        bodySpacing: 10,
                        borderWidth: 3,
                        xPadding: 10,
                        yPadding: 10,
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display:false
                            },
                            ticks: {
                                fontColor: "#9ca0a8",
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display:true
                            },
                            ticks: {
                                fontColor: "#9ca0a8",
                            }
                        }]
                    }
                },
            });
        },

    </script>
    @endsection
