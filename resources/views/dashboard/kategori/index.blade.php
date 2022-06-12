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
                              <li class="breadcrumb-item active" aria-current="page">Kategori</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Kategori</h1> 
                    </div>
                    @if(Auth::check())
                     <div class="col-6">
                        <div class="text-end upgrade-btn">
                            <a href="#" class="btn btn-primary text-white" 
                            data-bs-toggle="modal" data-bs-target="#tambahKategori">
                                Tambah Data Kategori
                            </a>
                        </div>
                    </div>
                    @endif
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
                                <h6 class="card-subtitle">Daftar kategori yang terdaftar di sistem</h6>
                                <div class="table-responsive">
                                    <table class="table" id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $key => $item)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$item->nama}}</td>
                                                <td>
                                                     @if(Auth::check())
                                                    <a href="#" class="btn-info btn-sm"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editKategori{{$item->id}}">
                                                        <i class="fa fa-edit" style="color: white;"></i>
                                                    </a>
                                                    &nbsp;
                                                    <a href="#" class="btn-danger btn-sm"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteKategori{{$item->id}}">
                                                        <i class="fa fa-trash" style="color: white;"></i>
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            <!-- modal editKategori-->
                                            @include('dashboard.kategori.modal')
                                            <!-- end modal tambahKategori -->
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal tambahKategori-->
            <div class="modal" id="tambahKategori">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <form action="{{url('kategori_insert')}}" method="post">
                @csrf
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Kategori</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <!-- Modal body -->
                <div class="modal-body">
                     <div class="form-group first">
                        <label for="username">Nama</label>
                        <input type="text" class="form-control" placeholder="Bahan Baku" id="username" name="nama" required>
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
            <!-- end modal tambahKategori -->
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