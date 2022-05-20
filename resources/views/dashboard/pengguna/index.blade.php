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
                              <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Pengguna</h1> 
                    </div>
                     <div class="col-6">
                        <div class="text-end upgrade-btn">
                            <a href="#" class="btn btn-primary text-white" 
                            data-bs-toggle="modal" data-bs-target="#tambahPengguna">
                                Tambah Data Pengguna
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
                                <h6 class="card-subtitle">Daftar pengguna yang terdaftar di sistem</h6>
                                <div class="table-responsive">
                                    <table class="table" id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $key => $item)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->role}}</td>
                                                <td>
                                                    <a href="#" class="btn-info btn-sm"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editPengguna{{$item->id}}">
                                                        <i class="fa fa-edit" style="color: white;"></i>
                                                    </a>
                                                    &nbsp;
                                                    <a href="#" class="btn-danger btn-sm"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deletePengguna{{$item->id}}">
                                                        <i class="fa fa-trash" style="color: white;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- modal editPengguna-->
                                            @include('dashboard.pengguna.modal')
                                            <!-- end modal tambahPengguna -->
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal tambahPengguna-->
            <div class="modal" id="tambahPengguna">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <form action="{{url('pengguna_insert')}}" method="post">
                @csrf
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Pengguna</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <!-- Modal body -->
                <div class="modal-body">
                     <div class="form-group first">
                        <label for="username">Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Juan Kartolo" id="username" name="name" required>
                      </div>
                      <div class="form-group first">
                        <label for="username">Role</label>
                        <select class="form-control" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="pengurus">Pengguna</option>
                        </select>
                      </div>
                      <div class="form-group first">
                        <label for="username">Email</label>
                        <input type="email" class="form-control" placeholder="email@gmail.com" id="username" name="email" required>
                      </div>
                      <div class="form-group last mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Password" id="password" required name="password">
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
            <!-- end modal tambahPengguna -->
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