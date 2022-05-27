@extends('layouts.main')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
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
                              <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Transaksi</h1> 
                    </div>
                     <div class="col-6">
                        <div class="text-end upgrade-btn">
                            <a href="#" class="btn btn-primary text-white" 
                            data-bs-toggle="modal" data-bs-target="#tambahTransaksi">
                                Tambah Data Transaksi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @if($message=Session::get('error'))
            <div class="alert bg-teal" role="alert">
                <p align="center" style="color: red">  <em class="fa fa-lg fa-close">&nbsp;</em>  {{$message}}</p>
            </div>
            @endif
            @if($message=Session::get('success'))
            <div class="alert bg-teal" role="alert">
                <p align="center" style="color: green">  
                    <em class="fa fa-lg fa-check">&nbsp;</em>  {{$message}}
                </p>
            </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                     <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                 <nav>
                                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                                        Masuk
                                    </button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                                        Keluar
                                    </button>
                                  </div>
                                </nav>
                            </div>
                            <div class="card-body">
                                <h6 class="card-subtitle">Daftar transaksi yang terdaftar di sistem</h6>
                               

                                <div class="tab-content" id="nav-tabContent">
                                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                       <div class="table-responsive">
                                        <table class="table example" id="" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Keterangan</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Pemasok</th>
                                                    <th scope="col">Grand Total</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data['masuk'] as $key => $item)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$item['keterangan']}}</td>
                                                    <td>{{$item['tanggal']}}</td>
                                                    <td>{{$item['qty']}}</td>
                                                    <td>{{$item['nama_pemasok']}}</td>
                                                    <td>{{$item['grandtotal']}}</td>
                                                    <td>
                                                        <a href="{{url('update_transaksi_masuk')}}/{{$item['id']}}" >
                                                            <i class="fa fa-edit" style="color: black;"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                  </div>
                                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                                    <div class="table-responsive">
                                        <table class="table example" id="" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Keterangan</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Penanggung Jawab</th>
                                                    <th scope="col">Grand Total</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data['keluar'] as $key => $item)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$item['keterangan']}}</td>
                                                    <td>{{$item['tanggal']}}</td>
                                                    <td>{{$item['qty']}}</td>
                                                    <td>{{$item['nama_pengguna']}}</td>
                                                    <td>{{$item['grandtotal']}}</td>
                                                    <td>
                                                        <a href="{{url('update_transaksi_keluar')}}/{{$item['id']}}" >
                                                            <i class="fa fa-edit" style="color: black;"></i>
                                                        </a>
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

            <!-- modal tambahTransaksi-->
                        <div class="modal" id="tambahTransaksi">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <form action="{{url('add_trs_by_type')}}" method="post">
                @csrf
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Transaksi</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <!-- Modal body -->
                <div class="modal-body">
                     <div class="form-group first">
                        <label for="username">Banyak barang yg di inginkan</label>
                        <input type="number" class="form-control" placeholder="ex : 10" id="username" name="banyak" required>
                      </div>
                      <div class="form-group first">
                        <label for="username">Type</label>
                        <select class="form-control" name="type" required>
                            <option value="masuk">Transaksi Masuk</option>
                            <option value="keluar">Transaksi Keluar</option>
                        </select>
                      </div>
                 </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                     <input type="submit" value="Submit" class="btn btn-block btn-primary">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
            <!-- end modal tambahTransaksi -->
           @include('layouts.footer')
        </div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.example').DataTable();
} );
</script>
@endsection