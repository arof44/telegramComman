<?php

namespace App\Models;
use DB;
use Carbon\Carbon;
class Barang 
{
    public function get()
    {
        $data = DB::table('barang as br')
        ->join('kategori as kr','kr.id','=','br.id_kategori')
        ->where('br.id','!=',0)
        ->select('kr.nama as nama_kategori','br.*')
        ->get();
        return $data;
    }

    public function create($request)
    {
        $data = DB::table('barang')->insert([
            'id_kategori'=>$request->id_kategori,
            'nama'=>$request->nama,
            'harga'=>$request->harga,
            'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
        ]);
    }

    public function update($request,$id)
    {
        $data = DB::table('barang')->where('id',$id)->update([
            'id_kategori'=>$request->id_kategori,
            'nama'=>$request->nama,
            'harga'=>$request->harga,
            'updated_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
        ]);
    }

    public function delete($id)
    {
        $data = DB::table('barang')->where('id_barang')->where('id',$id)->delete();
        $barang = DB::table('barang_stock')->where('id_barang',$id)->update(['id_barang'=>0]);
        $transaksi = DB::table('transaksi_item')->where('id_barang',$id)->update(['id_barang'=>0]);
    }
}
