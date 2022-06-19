@extends('layouts.main')
@section('content')
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                              <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Dashboard</h1> 
                    </div>
                    <!-- <div class="col-6">
                        <div class="text-end upgrade-btn">
                            <a href="https://www.wrappixel.com/templates/flexy-bootstrap-admin-template/" class="btn btn-primary text-white"
                                target="_blank">Upgrade to Pro</a>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="mini-stat clearfix bg-facebook rounded">
                <span class="mini-stat-icon"><i class="fa fa-facebook fg-facebook"></i></span>
                <div class="mini-stat-info">
                    <span>5,762</span>
                    Facebook Like
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="mini-stat clearfix bg-twitter rounded">
                <span class="mini-stat-icon"><i class="fa fa-twitter fg-twitter"></i></span>
                <div class="mini-stat-info">
                    <span>7,153</span>
                    Twitter Followers
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="mini-stat clearfix bg-googleplus rounded">
                <span class="mini-stat-icon"><i class="fa fa-google-plus fg-googleplus"></i></span>
                <div class="mini-stat-info">
                    <span>793</span>
                    Google+ Posts
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="mini-stat clearfix bg-bitbucket rounded">
                <span class="mini-stat-icon"><i class="fa fa-bitbucket fg-bitbucket"></i></span>
                <div class="mini-stat-info">
                    <span>8,932</span>
                    Repository
                </div>
            </div>
        </div>        
    </div>
</div>

                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                               <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex">
                                    <div>
                                        <h4 class="card-title">Top 5 Barang Cepat Habis</h4>
                                        <h5 class="card-subtitle">Urutan barang cepat habis</h5>
                                    </div>
                                </div>
                                <!-- title -->
                                <div class="table-responsive">
                                     <table class="table mb-0 table-hover align-middle text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Nama Barang</th>
                                                <th class="border-top-0">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($hasilBarangHabis as $br => $brt)
                                            <tr>
                                                <td>
                                                    {{$br+1}}
                                                </td>
                                                <td>
                                                   {{$brt['nama_barang']}}
                                                </td>
                                                <td>
                                                    {{$brt['qty']}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Top 5 Barang Baru Masuk</h4>
                                <h6 class="card-subtitle">Urutan barang masuk paling terbaru</h6>
                                @foreach($barangBaru as $brb)
                                <div class="mt-5 pb-3 d-flex align-items-center">
                                <i class="fa fa-wrench" ></i>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">{{$brb->nama_barang}}</h5>
                                        <span class="text-muted fs-6">{{$brb->created_at}}</span>
                                    </div>
                                </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <!-- <div class="d-md-flex">
                                    <div>
                                        <h4 class="card-title"></h4>
                                        <h5 class="card-subtitle"></h5>
                                    </div>
                                </div> -->
                                <!-- title -->
                                <!-- <div class="table-responsive"> -->
                                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div> 
                </div>

                

            </div>
           @include('layouts.footer')
        </div>
@endsection
@section('script')
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
    window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
    title: {
        text: "History Transaksi"
    },
    axisX: {
        valueFormatString: "MMM YYYY"
    },
    axisY2: {
        title: "Transaksi Keluar Masuk Barang",
        prefix: "Rp",
        suffix: ""
    },
    toolTip: {
        shared: true
    },
    legend: {
        cursor: "pointer",
        verticalAlign: "top",
        horizontalAlign: "center",
        dockInsidePlotArea: true,
        itemclick: toogleDataSeries
    },
    data: [{
        type:"line",
        axisYType: "secondary",
        name: "Masuk",
        showInLegend: true,
        markerSize: 0,
        yValueFormatString: "",
        dataPoints: [       
            // { x: new Date(2014, 00, 01), y: 850 },
            <?php foreach($dataBulan as $key => $dt){ ?>

                { x: new Date(<?php echo $dataBulan[$key]['Y'] ?>, <?php echo $dataBulan[$key]['m'] ?>, <?php echo $dataBulan[$key]['d'] ?>), y: <?php echo $dataBulan[$key]['masuk'] ?> },

            <?php } ?>
        ]
    },
    {
        type: "line",
        axisYType: "secondary",
        name: "Keluar",
        showInLegend: true,
        markerSize: 0,
        yValueFormatString: "",
        dataPoints: [
            <?php foreach($dataBulan as $key => $dt){ ?>

                { x: new Date(<?php echo $dataBulan[$key]['Y'] ?>, <?php echo $dataBulan[$key]['m'] ?>, <?php echo $dataBulan[$key]['d'] ?>), y: <?php echo $dataBulan[$key]['keluar'] ?> },

            <?php } ?>
        ]
    }]
});
chart.render();

function toogleDataSeries(e){
    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
    } else{
        e.dataSeries.visible = true;
    }
    chart.render();
}

}
</script>
@endsection