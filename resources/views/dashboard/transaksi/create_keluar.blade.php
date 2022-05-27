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
                        <h1 class="mb-0 fw-bold">Tambah Transaksi</h1> 
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
                                <h3 class="card-subtitle" style="font-weight: bold;">Tambah data transaksi</h3>
                            <form action="{{url('post_create_keluar')}}" method="post">
                                @csrf
                                  <!-- Modal body -->
                                <div class="modal-body">
                                     <div class="form-group first">

                                        <div class="row">
                                            <div class="col-md-6">
                                                 <label for="username">Tanggal Transaksi</label>
                                                <input type="date" value="{{date('Y-m-d')}}" class="form-control" id="username" name="date_trs" required >
                                            </div>
                                            <div class="col-md-6">
                                                 <label for="username">Keterangan</label>
                                                <input type="text" value="" placeholder="Bulanan stock" class="form-control" id="username" name="keterangan" required>
                                            </div>
                                        </div>
                                
                                      </div>

                                       <div class="form-group first">
                                         <label for="username">Type</label>
                                        <input type="text" value="Barang keluar" class="form-control" id="username" name="keterangan_1" required readonly>
                                      </div>


                                      <div class="form-group first">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                               <label for="username">Penanggung Jawab</label>
                                                <select class="form-control" name="id_user" required>
                                                    @foreach($pengguna as $as => $pItem)
                                                        <option value="{{$pItem->id}}">
                                                            {{$pItem->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                @for($i=0;$i < $banyak; $i++)
                                                <div class="row">
                                                     <div class="col-md-6">
                                                        <label for="username">Barang ke - {{$i+1}}</label>
                                                        <select class="form-control" name="id_barang[]" required>
                                                          @foreach($barang as $as => $pItem)
                                                            <option value="{{$pItem->id}}">
                                                                {{$pItem->nama}}
                                                            </option>
                                                          @endforeach
                                                        </select>
                                                        
                                                        <br>
                                                     </div>
                                                     <div class="col-md-6">
                                                        <label for="username">Qty</label>
                                                        <input type="number" value="" placeholder="Ex : 10" class="form-control" id="username" name="qty[]" required>
                                                     </div>
                                                </div>
                                                @endfor
                                            </div>

                                        </div>
                                        
                                      </div>
                                 </div>
                                  <!-- Modal footer -->
                                  <div class="modal-footer">
                                     <input type="submit" value="Submit" class="btn btn-block btn-primary">
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