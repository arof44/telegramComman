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
                              <li class="breadcrumb-item active" aria-current="page">Barang</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Barang</h1> 
                    </div>
                     <div class="col-2">
                        <div class="text-end upgrade-btn">
                            <a href="#" class="btn btn-danger btn-sm  text-white" 
                            data-bs-toggle="modal" data-bs-target="#tambahBarang">
                                - Barang Keluar
                            </a>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="text-end upgrade-btn">

                            <a href="#" class="btn btn-success btn-sm  text-white" 
                            data-bs-toggle="modal" data-bs-target="#tambahBarang">
                                + Barang Masuk
                            </a>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="text-end upgrade-btn">
                            <a href="#" class="btn btn-primary btn-sm text-white" 
                            data-bs-toggle="modal" data-bs-target="#tambahBarang">
                                Tambah Data Barang
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
                            <div class="card-body">
                                <h6 class="card-subtitle">Daftar barang yang terdaftar di sistem</h6>
                                <div class="table-responsive">
                                    <table class="table" id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Stock</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $key => $item)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$item->nama}}</td>
                                                <td>Rp.{{number_format($item->harga)}}</td>
                                                <td>{{$item->nama_kategori}}</td>
                                                <td>{{$item->stock}}</td>
                                                <td>
                                                    <a href="#" class="btn-info btn-sm"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editBarang{{$item->id}}">
                                                        <i class="fa fa-edit" style="color: white;"></i>
                                                    </a>
                                                    &nbsp;
                                                    <a href="#" class="btn-danger btn-sm"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteBarang{{$item->id}}">
                                                        <i class="fa fa-trash" style="color: white;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- modal editBarang-->
                                            @include('dashboard.barang.modal')
                                            <!-- end modal tambahBarang -->
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal tambahBarang-->
            <div class="modal" id="tambahBarang">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <form action="{{url('barang_insert')}}" method="post">
                @csrf
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Barang</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <!-- Modal body -->
                <div class="modal-body">
                     <div class="form-group first">
                        <label for="username">Nama</label>
                        <input type="text" class="form-control" placeholder="Triplek baru" id="username" name="nama" required>
                      </div>
                      <div class="form-group first">
                        <label for="username">Harga</label>
                        <input type="text" class="form-control" placeholder="20000" id="username" name="harga" required>
                      </div>
                     <div class="form-group first">
                        <label for="username">Kategori</label>
                        <select class="form-control" name="id_kategori" required>
                            @foreach($dataKategori as $kr)
                                <option value="{{$kr->id}}">{{$kr->nama}}</option>
                            @endforeach
                        </select>
                      </div>
                 </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                     <input type="submit" value="Tambah" class="btn btn-block btn-primary">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
            <!-- end modal tambahBarang -->
           @include('layouts.footer')
        </div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection