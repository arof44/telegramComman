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
                            <div class="card-body">
                                <h3 class="card-subtitle" style="font-weight: bold;">Import data transaksi masuk</h3>
                          <form action="{{url('laporan_report')}}/masuk" method="post">
                                @csrf
                                  <!-- Modal body -->
                                <div class="modal-body">
                                     <div class="form-group first">
                                        <label for="username">Mulai Tanggal</label>
                                        <input type="date" value="{{date('Y-m-d')}}" class="form-control" id="username" name="start_date" required>
                                      </div>
                                      <div class="form-group first">
                                        <label for="username">Sampai Tanggal</label>
                                        <input type="date" value="{{date('Y-m-d')}}" class="form-control" id="username" name="end_date" required>
                                      </div>
                                      <div class="form-group first">
                                       <label for="username">Pemasok</label>
                                       
                                                <select class="form-control" name="id_pemasok" required>
                                                    <option value="all">Semua</option>
                                                    @foreach($pemasok as $as => $pItem)
                                                        <option value="{{$pItem->id}}">
                                                            {{$pItem->nama}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                      </div>

                                      <div class="form-group first">
                                        <label for="username">Barang</label>
                                       
                                                <select class="form-control" name="id_barang" required>
                                                    <option value="all">Semua</option>
                                                    @foreach($barang as $as => $pItem)
                                                        <option value="{{$pItem->id}}">
                                                            {{$pItem->nama}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                      </div>

                                 </div>
                                  <!-- Modal footer -->
                                  <div class="modal-footer">
                                     <input type="submit" value="Download" class="btn btn-block btn-primary">
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-subtitle" style="font-weight: bold;">Import data transaksi keluar</h3>
                            <form action="{{url('laporan_report')}}/keluar" method="post">
                                @csrf
                                  <!-- Modal body -->
                                <div class="modal-body">
                                     <div class="form-group first">
                                        <label for="username">Mulai Tanggal</label>
                                        <input type="date" value="{{date('Y-m-d')}}" class="form-control" id="username" name="start_date" required>
                                      </div>
                                      <div class="form-group first">
                                        <label for="username">Sampai Tanggal</label>
                                        <input type="date" value="{{date('Y-m-d')}}" class="form-control" id="username" name="end_date" required>
                                      </div>
                                      <div class="form-group first">
                                        <label for="username">Penanggung Jawab</label>
                                       
                                                <select class="form-control" name="id_user" required>
                                                     <option value="all">Semua</option>
                                                    @foreach($pengguna as $as => $pItem)
                                                        <option value="{{$pItem->id}}">
                                                            {{$pItem->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                      </div>

                                      <div class="form-group first">
                                        <label for="username">Barang</label>
                                       
                                                <select class="form-control" name="id_barang" required>
                                                    <option value="all">Semua</option>
                                                    @foreach($barang as $as => $pItem)
                                                        <option value="{{$pItem->id}}">
                                                            {{$pItem->nama}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                      </div>

                                 </div>
                                  <!-- Modal footer -->
                                  <div class="modal-footer">
                                     <input type="submit" value="Download" class="btn btn-block btn-primary">
                                  </div>
                                </form>
                            </div>
                        </div>
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