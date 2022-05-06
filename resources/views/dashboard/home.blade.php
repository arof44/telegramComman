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
                    <div class="col-lg-8">
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
                                        <h4 class="card-title">Top 5 Nasbah</h4>
                                        <h5 class="card-subtitle">Urutan nasbah dengan skor penyetoran sampah</h5>
                                    </div>
                                    <!-- <div class="ms-auto">
                                        <div class="dl">
                                            <select class="form-select shadow-none">
                                                <option value="0" selected>Monthly</option>
                                                <option value="1">Daily</option>
                                                <option value="2">Weekly</option>
                                                <option value="3">Yearly</option>
                                            </select>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- title -->
                                <div class="table-responsive">
                                     <table class="table mb-0 table-hover align-middle text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Nama Nasbah</th>
                                                <th class="border-top-0">Alamat</th>
                                                <th class="border-top-0">No Tlp</th>
                                                <th class="border-top-0">Total Stor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="m-r-10"><a
                                                                class="btn btn-circle d-flex btn-info text-white">EA</a>
                                                        </div>
                                                        <div class="">
                                                            <h4 class="m-b-0 font-16">Elite Admin</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Single Use</td>
                                                <td>John Doe</td>
                                                <td>
                                                    <label class="badge bg-danger">Angular</label>
                                                </td>
                                            </tr>
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
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sampah Populer</h4>
                                <h6 class="card-subtitle">Paling banyak di stor</h6>
                                <div class="mt-5 pb-3 d-flex align-items-center">
                                   
                                        <i class="fa fa-trash" ></i>

                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Sampah Plastik</h5>
                                        <span class="text-muted fs-6">Total</span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+68%</span>
                                    </div>
                                </div>
                                <div class="py-3 d-flex align-items-center">
                                   
                                        <i class="fa fa-trash" ></i>
                                   
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Sampah Kertas</h5>
                                        <span class="text-muted fs-6">Totak</span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+68%</span>
                                    </div>
                                </div>
                                <div class="py-3 d-flex align-items-center">
                                   
                                       <i class="fa fa-trash" ></i>
                                    
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Sampah Logam</h5>
                                        <span class="text-muted fs-6">Total</span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+68%</span>
                                    </div>
                                </div>
                                <div class="py-3 d-flex align-items-center">
                                   
                                        <i class="fa fa-trash" ></i>
                                  
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Sampah Botol & Kaca</h5>
                                        <span class="text-muted fs-6">Total</span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+15%</span>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex">
                                    <div>
                                        <h4 class="card-title">Top 5 Sopir</h4>
                                        <h5 class="card-subtitle">Urutan nasbah dengan skor pengambilan sampah</h5>
                                    </div>
                                </div>
                                <!-- title -->
                                <div class="table-responsive">
                                    <table class="table mb-0 table-hover align-middle text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Nama Sopir</th>
                                                <th class="border-top-0">Alamat</th>
                                                <th class="border-top-0">No Tlp</th>
                                                <th class="border-top-0">Total Pickup</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="m-r-10"><a
                                                                class="btn btn-circle d-flex btn-info text-white">EA</a>
                                                        </div>
                                                        <div class="">
                                                            <h4 class="m-b-0 font-16">Elite Admin</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Single Use</td>
                                                <td>John Doe</td>
                                                <td>
                                                    <label class="badge bg-danger">Angular</label>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                
            </div>
           @include('layouts.footer')
        </div>
@endsection
@section('script')

@endsection