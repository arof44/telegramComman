<?php

namespace App\Models;
use DB;
use Carbon\Carbon;
use Auth;
class Transaksi 
{
	public function get()
    {
        $pemasok = DB::table('transaksi as trs')
        ->join('pemasok as pm','pm.id','=','trs.id_pemasok')
        ->get();
        $pelanggan = DB::table('transaksi as trs')
        ->join('pelanggan as plg','plg.id','=','trs.id_pelanggan')
        ->get();
        $arr = ['pemasok'=>$pemasok,'pelanggan'=>$pelanggan];
        return $arr;
    }

    public function createTranskasiPelanggan($request)
    {
        $no =strtotime(date('Y-m-d H:i:s'));
        $data = DB::table('transaksi')->insertGetId([
            'no_transaksi'=>$no,
            'tanggal'=>Carbon::now('Asia/Jakarta')->format('Y-m-d'),
            'id_user'=>Auth::user()->id,
            'id_pelanggan'=>$request->id_pelanggan,
            'status'=>$request->status,
            'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
        ]);
        $grandtotal = 0;
        foreach ($request->id_barang as $key => $value) {
            $item = DB::table('transaksi_item')->insert([
                'id_transaksi'=>$data,
                'id_barang'=>$value,
                'qty'=>$request->qty[$key],
                'harga'=>$request->harga[$key],
                'grandtotal'=>$request->grandtotal[$key],
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);

            DB::table('barang_stock')->insert([
                'id_barang'=>$value,
                'id_transaksi'=>$data,
                'qty'=>$request->qty[$key],
                'type'=>$request->type,
                'tanggal'=>Carbon::now('Asia/Jakarta')->format('Y-m-d'),
                'id_user'=>Auth::user()->id,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            $grandtotal += $request->grandtotal[$key];
        }
        DB::table('transaksi')->where('id',$id)->update(['grandtotal'=>$grandtotal]);
    }

    public function updateTranskasiPelanggan($request,$id)
    {
        DB::table('transaksi')->where('id',$id)->update([
            'no_transaksi'=>$no,
            'tanggal'=>Carbon::now('Asia/Jakarta')->format('Y-m-d'),
            'id_user'=>Auth::user()->id,
            'id_pelanggan'=>$request->id_pelanggan,
            'status'=>$request->status,
            'updated_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
        ]);
        DB::table('transaksi_item')->where('id_transaksi',$id)->delete();
        DB::table('barang_stock')->where('id_transaksi',$id)->delete();
        $grandtotal = 0;
        foreach ($request->id_barang as $key => $value) {
            $item = DB::table('transaksi_item')->insert([
                'id_transaksi'=>$data,
                'id_barang'=>$value,
                'qty'=>$request->qty[$key],
                'harga'=>$request->harga[$key],
                'grandtotal'=>$request->grandtotal[$key],
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);

            DB::table('barang_stock')->insert([
                'id_barang'=>$value,
                'id_transaksi'=>$data,
                'qty'=>$request->qty[$key],
                'type'=>$request->type,
                'tanggal'=>Carbon::now('Asia/Jakarta')->format('Y-m-d'),
                'id_user'=>Auth::user()->id,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            $grandtotal += $request->grandtotal[$key];
        }
        DB::table('transaksi')->where('id',$id)->update(['grandtotal'=>$grandtotal]);
    }

    public function createTranskasiPemasok($request)
    {
        $no =strtotime(date('Y-m-d H:i:s'));
        $data = DB::table('transaksi')->insertGetId([
            'no_transaksi'=>$no,
            'tanggal'=>Carbon::now('Asia/Jakarta')->format('Y-m-d'),
            'id_user'=>Auth::user()->id,
            'id_pemasok'=>$request->id_pemasok,
            'status'=>$request->status,
            'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
        ]);
        $grandtotal = 0;
        foreach ($request->id_barang as $key => $value) {
            $item = DB::table('transaksi_item')->insert([
                'id_transaksi'=>$data,
                'id_barang'=>$value,
                'qty'=>$request->qty[$key],
                'harga'=>$request->harga[$key],
                'grandtotal'=>$request->grandtotal[$key],
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);

            DB::table('barang_stock')->insert([
                'id_barang'=>$value,
                'id_transaksi'=>$data,
                'qty'=>$request->qty[$key],
                'type'=>$request->type,
                'tanggal'=>Carbon::now('Asia/Jakarta')->format('Y-m-d'),
                'id_user'=>Auth::user()->id,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            $grandtotal += $request->grandtotal[$key];
        }
        DB::table('transaksi')->where('id',$id)->update(['grandtotal'=>$grandtotal]);
    }

    public function updateTranskasiPemasok($request,$id)
    {
        DB::table('transaksi')->where('id',$id)->update([
            'no_transaksi'=>$no,
            'tanggal'=>Carbon::now('Asia/Jakarta')->format('Y-m-d'),
            'id_user'=>Auth::user()->id,
            'id_pemasok'=>$request->id_pemasok,
            'status'=>$request->status,
            'updated_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
        ]);
        DB::table('transaksi_item')->where('id_transaksi',$id)->delete();
        DB::table('barang_stock')->where('id_transaksi',$id)->delete();
        $grandtotal = 0;
        foreach ($request->id_barang as $key => $value) {
            $item = DB::table('transaksi_item')->insert([
                'id_transaksi'=>$data,
                'id_barang'=>$value,
                'qty'=>$request->qty[$key],
                'harga'=>$request->harga[$key],
                'grandtotal'=>$request->grandtotal[$key],
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);

            DB::table('barang_stock')->insert([
                'id_barang'=>$value,
                'id_transaksi'=>$data,
                'qty'=>$request->qty[$key],
                'type'=>$request->type,
                'tanggal'=>Carbon::now('Asia/Jakarta')->format('Y-m-d'),
                'id_user'=>Auth::user()->id,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            $grandtotal += $request->grandtotal[$key];
        }
        DB::table('transaksi')->where('id',$id)->update(['grandtotal'=>$grandtotal]);
    }

    // public function delete($id)
    // {

    // }
}
