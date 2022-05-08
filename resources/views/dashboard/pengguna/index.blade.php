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
                              <li class="breadcrumb-item active" aria-current="page">Nasabah</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Nasabah</h1> 
                    </div>
                     <div class="col-6">
                        <div class="text-end upgrade-btn">
                            <a href="#" class="btn btn-primary text-white" 
                            data-bs-toggle="modal" data-bs-target="#tambahNasabah">
                                Tambah Data Nasabah
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
                                <h6 class="card-subtitle">Daftar nasabah yang terdaftar di sistem</h6>
                                <div class="table-responsive">
                                    <table class="table" id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">No Tlp</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $key => $item)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$item->nama}}</td>
                                                <td>{{$item->alamat}}</td>
                                                <td>{{$item->phone}}</td>
                                                <td>
                                                    <a href="#" class="btn-info btn-sm"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editNasabah{{$item->id}}">
                                                        <i class="fa fa-edit" style="color: white;"></i>
                                                    </a>
                                                    &nbsp;
                                                    <a href="#" class="btn-danger btn-sm"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteNasabah{{$item->id}}">
                                                        <i class="fa fa-trash" style="color: white;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- modal editNasabah-->
                                            @include('dashboard.nasabah.modal')
                                            <!-- end modal tambahNasabah -->
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal tambahNasabah-->
            <div class="modal" id="tambahNasabah">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <form action="{{url('tambah_nasabah')}}" method="post">
                @csrf
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Nasabah</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <!-- Modal body -->
                <div class="modal-body">
                     <div class="form-group first">
                        <label for="username">Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Juan Kartolo" id="username" name="name" required>
                      </div>
                      <div class="form-group first">
                        <label for="username">Alamat Lengkap</label>
                        <textarea class="form-control"  name="alamat" placeholder="Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141" required></textarea>
                      </div>
                      <div class="form-group first">
                        <label for="username">Nomor Telepon Yang Bisa Dihubungi</label>
                        <input type="text" class="form-control" placeholder="08567169983711" id="username" name="phone" required>
                      </div>
                      <div class="form-group first">
                        <label for="username">Jenis Anggota</label>
                        <select class="form-control" name="kelompok">
                            <option value="Individu">Individu</option>
                            <option value="Kelompok">Kelompok</option>
                        </select>
                      </div>
                      <div class="form-group first">
                        <label for="username">Kesepakatan Harga</label>
                        <select class="form-control" name="jenis_trs">
                            <option value="Langsung">Langsung</option>
                            <option value="Ditabung">Ditabung</option>
                        </select>
                      </div>
                      <div class="form-group first">
                        <label for="username">Email</label>
                        <input type="email" class="form-control" placeholder="email@gmail.com" id="username" name="email" required>
                      </div>
                      <div class="form-group last mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Password" id="password" required name="password_nasabah">
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
            <!-- end modal tambahNasabah -->
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