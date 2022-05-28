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
        yValueFormatString: "$#,###k",
        dataPoints: [       
            { x: new Date(2014, 00, 01), y: 850 },
            { x: new Date(2014, 01, 01), y: 889 },
            { x: new Date(2014, 02, 01), y: 890 },
            { x: new Date(2014, 03, 01), y: 899 },
            { x: new Date(2014, 04, 01), y: 903 },
            { x: new Date(2014, 05, 01), y: 925 },
            { x: new Date(2014, 06, 01), y: 899 },
            { x: new Date(2014, 07, 01), y: 875 },
            { x: new Date(2014, 08, 01), y: 927 },
            { x: new Date(2014, 09, 01), y: 949 },
            { x: new Date(2014, 10, 01), y: 946 },
            { x: new Date(2014, 11, 01), y: 927 },
            { x: new Date(2015, 00, 01), y: 950 },
            { x: new Date(2015, 01, 01), y: 998 },
            { x: new Date(2015, 02, 01), y: 998 },
            { x: new Date(2015, 03, 01), y: 1050 },
            { x: new Date(2015, 04, 01), y: 1050 },
            { x: new Date(2015, 05, 01), y: 999 },
            { x: new Date(2015, 06, 01), y: 998 },
            { x: new Date(2015, 07, 01), y: 998 },
            { x: new Date(2015, 08, 01), y: 1050 },
            { x: new Date(2015, 09, 01), y: 1070 },
            { x: new Date(2015, 10, 01), y: 1050 },
            { x: new Date(2015, 11, 01), y: 1050 },
            { x: new Date(2016, 00, 01), y: 995 },
            { x: new Date(2016, 01, 01), y: 1090 },
            { x: new Date(2016, 02, 01), y: 1100 },
            { x: new Date(2016, 03, 01), y: 1150 },
            { x: new Date(2016, 04, 01), y: 1150 },
            { x: new Date(2016, 05, 01), y: 1150 },
            { x: new Date(2016, 06, 01), y: 1100 },
            { x: new Date(2016, 07, 01), y: 1100 },
            { x: new Date(2016, 08, 01), y: 1150 },
            { x: new Date(2016, 09, 01), y: 1170 },
            { x: new Date(2016, 10, 01), y: 1150 },
            { x: new Date(2016, 11, 01), y: 1150 },
            { x: new Date(2017, 00, 01), y: 1150 },
            { x: new Date(2017, 01, 01), y: 1200 },
            { x: new Date(2017, 02, 01), y: 1200 },
            { x: new Date(2017, 03, 01), y: 1200 },
            { x: new Date(2017, 04, 01), y: 1190 },
            { x: new Date(2017, 05, 01), y: 1170 }
        ]
    },
    {
        type: "line",
        axisYType: "secondary",
        name: "Keluar",
        showInLegend: true,
        markerSize: 0,
        yValueFormatString: "$#,###k",
        dataPoints: [
            { x: new Date(2014, 00, 01), y: 1200 },
            { x: new Date(2014, 01, 01), y: 1200 },
            { x: new Date(2014, 02, 01), y: 1190 },
            { x: new Date(2014, 03, 01), y: 1180 },
            { x: new Date(2014, 04, 01), y: 1250 },
            { x: new Date(2014, 05, 01), y: 1270 },
            { x: new Date(2014, 06, 01), y: 1300 },
            { x: new Date(2014, 07, 01), y: 1300 },
            { x: new Date(2014, 08, 01), y: 1358 },
            { x: new Date(2014, 09, 01), y: 1410 },
            { x: new Date(2014, 10, 01), y: 1480 },
            { x: new Date(2014, 11, 01), y: 1500 },
            { x: new Date(2015, 00, 01), y: 1500 },
            { x: new Date(2015, 01, 01), y: 1550 },
            { x: new Date(2015, 02, 01), y: 1550 },
            { x: new Date(2015, 03, 01), y: 1590 },
            { x: new Date(2015, 04, 01), y: 1600 },
            { x: new Date(2015, 05, 01), y: 1590 },
            { x: new Date(2015, 06, 01), y: 1590 },
            { x: new Date(2015, 07, 01), y: 1620 },
            { x: new Date(2015, 08, 01), y: 1670 },
            { x: new Date(2015, 09, 01), y: 1720 },
            { x: new Date(2015, 10, 01), y: 1750 },
            { x: new Date(2015, 11, 01), y: 1820 },
            { x: new Date(2016, 00, 01), y: 2000 },
            { x: new Date(2016, 01, 01), y: 1920 },
            { x: new Date(2016, 02, 01), y: 1750 },
            { x: new Date(2016, 03, 01), y: 1850 },
            { x: new Date(2016, 04, 01), y: 1750 },
            { x: new Date(2016, 05, 01), y: 1730 },
            { x: new Date(2016, 06, 01), y: 1700 },
            { x: new Date(2016, 07, 01), y: 1730 },
            { x: new Date(2016, 08, 01), y: 1720 },
            { x: new Date(2016, 09, 01), y: 1740 },
            { x: new Date(2016, 10, 01), y: 1750 },
            { x: new Date(2016, 11, 01), y: 1750 },
            { x: new Date(2017, 00, 01), y: 1750 },
            { x: new Date(2017, 01, 01), y: 1770 },
            { x: new Date(2017, 02, 01), y: 1750 },
            { x: new Date(2017, 03, 01), y: 1750 },
            { x: new Date(2017, 04, 01), y: 1730 },
            { x: new Date(2017, 05, 01), y: 1730 }
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