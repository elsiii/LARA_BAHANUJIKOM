@extends('template_back.content')
@section('title', 'Dashboard')
@section('content')

@php
    $isrole=auth()->user()->isrole;
@endphp
<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Hi, welcome back! @auth {{ auth()->user()->name }} @endauth</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a   href="{{route('dashboard')}}">Dashboard</a></li>
                    <!-- <li class="breadcrumb-item active" aria-current="page">Project</li> -->
                </ol>
            </nav>
        </div>
        <div class="d-flex my-auto">
            <div class=" d-flex right-page">
                <!-- <div class="d-flex justify-content-center me-5">
                    <div class="">
                        <span class="d-block">
                            <span class="label ">EXPENSES</span>
                        </span>
                        <span class="value">
                            $53,000
                        </span>
                    </div>
                    <div class="ms-3 mt-2">
                        <span class="sparkline_bar"></span>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="">
                        <span class="d-block">
                            <span class="label">PROFIT</span>
                        </span>
                        <span class="value">
                            $34,000
                        </span>
                    </div>
                    <div class="ms-3 mt-2">
                        <span class="sparkline_bar31"></span>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->

    <!-- main-content-body -->
    <div class="main-content-body">

        <div class="row row-sm">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card overflow-hidden project-card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="my-auto">
                                <div class="me-4 ht-60 wd-60 my-auto primary">
                                    <img src="{{ asset('') }}images/svg/box.svg" width="100px" height="100px" class="ht-40 wd-60">
                                </div>
                            </div>
                            <div class="project-content">
                                <h6 class="card-title">Data Barang</h6>
                                <ul>
                                    <li>
                                        <strong>Total</strong>
                                        <span>{{$total_barang}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card  overflow-hidden project-card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="my-auto">
                                <div class="me-4 ht-60 wd-60 my-auto warning">
                                <img src="{{ asset('') }}images/svg/tags-label.svg" width="100px" height="100px" class="ht-40 wd-60">
                                </div>
                            </div>
                            <div class="project-content">
                                <h6 class="card-title">Kategori Barang </h6>
                                <ul>
                                    <li>
                                        <strong>Total</strong>
                                        <span>{{$total_kategoribarang}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card overflow-hidden project-card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="my-auto">
                                <div class="me-4 ht-60 wd-60 my-auto danger">
                                <img src="{{ asset('') }}images/svg/cancel-delivery.svg" width="100px" height="100px" class="ht-40 wd-60">
                                </div>
                            </div>
                            <div class="project-content">
                                <h6 class="card-title">Barang Expired</h6>
                                <ul>
                                    <li>
                                        <strong>Total</strong>
                                        <span>{{$total_expired}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card overflow-hidden project-card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="my-auto">
                                <div class="me-4 ht-60 wd-60 my-auto success">
                                <img src="{{ asset('') }}images/svg/akun.svg" width="100px" height="100px" class="ht-40 wd-60">
                                </div>
                            </div>
                            <div class="project-content">
                                <h6 class="card-title">Akun Pengguna</h6>
                                <ul>
                                    <li>
                                        <strong>Total</strong>
                                        <span>{{$total_user}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="card overflow-hidden">
                    <div class="card-body pd-y-7 pt-3">
                        <div id="grafik_kategoribarang" style="width:100%"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="card overflow-hidden">
                    <div class="card-body pd-y-7 pt-3">
                        <div id="grafik_rangeharga" style="width:100%"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card overflow-hidden">
                    <div class="card-body pd-y-7 pt-3">
                        <div id="grafik_perbulan" style="width:100%"></div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>

<script>
    Highcharts.setOptions({
        colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        })
    });

    // Build the chart
    Highcharts.chart('grafik_kategoribarang', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Grafik Jumlah Data Barang per Kategori',
        },
        subtitle: {
            text: 'Tahun {{date('Y')}}'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}% | {point.y} data</b>'
        },
        accessibility: {
            point: {
                valueSuffix: 'data'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<span style="font-size: 1.2em"><b>{point.name}</b></span><br>' +
                        '<span style="opacity: 0.6">{point.percentage:.1f} % | {point.y} data</span>',
                    connectorColor: 'rgba(128,128,128,0.5)'
                }
            }
        },
        series: [{
            name: 'jumlah',
            data: [
                {!!$dataGrafikA!!}
            ]
        }]
    });

</script>
<script>
    // Build the chart
    Highcharts.chart('grafik_rangeharga', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Grafik Jumlah Data Barang Berdasarkan Range Harga Jual ',
        },
        subtitle: {
            text: 'Tahun {{date('Y')}}'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}% | {point.y} data</b>'
        },
        accessibility: {
            point: {
                valueSuffix: 'data'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<span style="font-size: 1.2em"><b>{point.name}</b></span><br>' +
                        '<span style="opacity: 0.6">{point.percentage:.1f} % | {point.y} data</span>',
                    connectorColor: 'rgba(128,128,128,0.5)'
                }
            }
        },
        series: [{
            name: 'jumlah',
            data: [
                {!!$dataGrafikB!!}
            ]
        }]
    });

</script>
<script>
    Highcharts.chart('grafik_perbulan', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Grafik Jumlah Data Barang per Bulan'
        },
        subtitle: {
            text: 'Tahun {{date('Y')}}'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Jumlah Barang'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Semua Barang',
            data: [{!!$dataGrafikC!!}]
        }, ]
    });
</script>

@endsection