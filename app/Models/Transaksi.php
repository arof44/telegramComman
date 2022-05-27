<?php

namespace App\Models;
use DB;
use Carbon\Carbon;
use Auth;
class Transaksi 
{
	public function get()
    {
        
        $keluar = DB::table('transaksi as trs')
        ->join('transaksi_item as trsi','trsi.id_transaksi','=','trs.id')
        ->join('barang_stock as brst','brst.id_transaksi','=','trs.id')
        ->join('users as us','us.id','=','trs.id_user')
        ->where('brst.type','k')
        ->select('trs.*','us.name as nama_pengguna','brst.type','brst.qty as qty')
        ->groupBy('trs.id')
        ->get();
        $keluarArr =  json_decode(json_encode($keluar),true);
        foreach ($keluarArr as $key => $value) {
            $qty = DB::table('barang_stock')->where('id_transaksi',$value['id'])->sum('qty');
            $keluarArr[$key]['qty'] = $qty;
        }
        $masuk = DB::table('transaksi as trs')
        ->join('transaksi_item as trsi','trsi.id_transaksi','=','trs.id')
        ->join('barang_stock as brst','brst.id_transaksi','=','trs.id')
        ->join('pemasok as pms','trs.id_pemasok','=','pms.id')
        ->where('brst.type','m')
        ->select('trs.*','pms.nama as nama_pemasok','brst.qty as qty')
        ->groupBy('trs.id')
        //->groupBy('trs.id')
        ->get();
        $masukArr =  json_decode(json_encode($masuk),true);
        foreach ($masukArr as $key => $value) {
            $qty = DB::table('barang_stock')->where('id_transaksi',$value['id'])->sum('qty');
            $masukArr[$key]['qty'] = $qty;
        }
        $arr = ['masuk'=>$masukArr,'keluar'=>$keluarArr];
        return $arr;
    }

    public function createTranskasiKeluar($request)
    {
        $no =strtotime(date('Y-m-d H:i:s'));
        $data = DB::table('transaksi')->insertGetId([
            'no_transaksi'=>$no,
            'tanggal'=>$request->date_trs,
            'id_user'=>$request->id_user,
            'keterangan'=>$request->keterangan,
            'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
        ]);
        $grandtotal = 0;
        foreach ($request->id_barang as $key => $value) {
            $grandtotalSub = $request->qty[$key] * $request->harga[$key];
            $item = DB::table('transaksi_item')->insert([
                'id_transaksi'=>$data,
                'id_barang'=>$value,
                'qty'=>$request->qty[$key],
                'harga'=>$request->harga[$key],
                'grandtotal'=>$grandtotalSub,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            DB::table('barang_stock')->insert([
                'id_barang'=>$value,
                'id_transaksi'=>$data,
                'qty'=>$request->qty[$key],
                'type'=>'k',
                'tanggal'=>$request->date_trs,
                'id_user'=>Auth::user()->id,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            $grandtotal += $grandtotalSub;

            //update stock on master 
            $stokMasuk =  DB::table('barang_stock')->where('id_barang',$value)->where('type','m')->sum('qty');
            $stokKeluar =  DB::table('barang_stock')->where('id_barang',$value)->where('type','k')->sum('qty');
            $stokFix = $stokMasuk - $stokKeluar;
            DB::table('barang')->where('id',$value)->update(['stock'=>$stokFix]);
        }
        DB::table('transaksi')->where('id',$data)->update(['grandtotal'=>$grandtotal]);
    }

    public function updateTranskasiKeluar($request,$id)
    {
        DB::table('transaksi')->where('id',$id)->update([
            'no_transaksi'=>$no,
            'tanggal'=>$request->date_trs,
            'id_user'=>$request->id_user,
            'keterangan'=>$request->keterangan,
            'updated_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
        ]);
        DB::table('transaksi_item')->where('id_transaksi',$id)->delete();
        DB::table('barang_stock')->where('id_transaksi',$id)->delete();
        $grandtotal = 0;
        foreach ($request->id_barang as $key => $value) {
            $grandtotalSub = $request->qty[$key] * $request->harga[$key];
            $item = DB::table('transaksi_item')->insert([
                'id_transaksi'=>$data,
                'id_barang'=>$value,
                'qty'=>$request->qty[$key],
                'harga'=>$request->harga[$key],
                'grandtotal'=>$grandtotalSub,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            DB::table('barang_stock')->insert([
                'id_barang'=>$value,
                'id_transaksi'=>$data,
                'qty'=>$request->qty[$key],
                'type'=>'k',
                'tanggal'=>$request->date_trs,
                'id_user'=>Auth::user()->id,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            $grandtotal += $grandtotalSub;

            //update stock on master 
            $stokMasuk =  DB::table('barang_stock')->where('id_barang',$value)->where('type','m')->sum('qty');
            $stokKeluar =  DB::table('barang_stock')->where('id_barang',$value)->where('type','k')->sum('qty');
            $stokFix = $stokMasuk - $stokKeluar;
            DB::table('barang')->where('id',$value)->update(['stock'=>$stokFix]);
        }
        DB::table('transaksi')->where('id',$id)->update(['grandtotal'=>$grandtotal]);
    }

    public function createTranskasiMasuk($request)
    {
        $no =strtotime(date('Y-m-d H:i:s'));
        $data = DB::table('transaksi')->insertGetId([
            'no_transaksi'=>$no,
            'tanggal'=>$request->date_trs,
            'id_user'=>Auth::user()->id,
            'id_pemasok'=>$request->id_pemasok,
            'keterangan'=>$request->keterangan,
            'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
        ]);
        $grandtotal = 0;
        foreach ($request->id_barang as $key => $value) {
            $grandtotalSub = $request->qty[$key] * $request->harga[$key];
            $item = DB::table('transaksi_item')->insert([
                'id_transaksi'=>$data,
                'id_barang'=>$value,
                'qty'=>$request->qty[$key],
                'harga'=>$request->harga[$key],
                'grandtotal'=>$grandtotalSub,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            DB::table('barang_stock')->insert([
                'id_barang'=>$value,
                'id_transaksi'=>$data,
                'qty'=>$request->qty[$key],
                'type'=>'m',
                'tanggal'=>$request->date_trs,
                'id_user'=>Auth::user()->id,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            $grandtotal += $grandtotalSub;

            //update stock on master 
            $stokMasuk =  DB::table('barang_stock')->where('id_barang',$value)->where('type','m')->sum('qty');
            $stokKeluar =  DB::table('barang_stock')->where('id_barang',$value)->where('type','k')->sum('qty');
            $stokFix = $stokMasuk - $stokKeluar;
            DB::table('barang')->where('id',$value)->update(['stock'=>$stokFix]);
        }
        DB::table('transaksi')->where('id',$data)->update(['grandtotal'=>$grandtotal]);
    }

    public function updateTranskasiMasuk($request,$id)
    {
        DB::table('transaksi')->where('id',$id)->update([
            'no_transaksi'=>$no,
            'tanggal'=>$request->date_trs,
            'id_user'=>Auth::user()->id,
            'id_pemasok'=>$request->id_pemasok,
            'keterangan'=>$request->keterangan,
            'updated_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
        ]);
        DB::table('transaksi_item')->where('id_transaksi',$id)->delete();
        DB::table('barang_stock')->where('id_transaksi',$id)->delete();
        $grandtotal = 0;
        foreach ($request->id_barang as $key => $value) {
            $grandtotalSub = $request->qty[$key] * $request->harga[$key];
            $item = DB::table('transaksi_item')->insert([
                'id_transaksi'=>$data,
                'id_barang'=>$value,
                'qty'=>$request->qty[$key],
                'harga'=>$request->harga[$key],
                'grandtotal'=>$grandtotalSub,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            DB::table('barang_stock')->insert([
                'id_barang'=>$value,
                'id_transaksi'=>$data,
                'qty'=>$request->qty[$key],
                'type'=>'m',
                'tanggal'=>$request->date_trs,
                'id_user'=>Auth::user()->id,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            $grandtotal += $grandtotalSub;

            //update stock on master 
            $stokMasuk =  DB::table('barang_stock')->where('id_barang',$value)->where('type','m')->sum('qty');
            $stokKeluar =  DB::table('barang_stock')->where('id_barang',$value)->where('type','k')->sum('qty');
            $stokFix = $stokMasuk - $stokKeluar;
            DB::table('barang')->where('id',$value)->update(['stock'=>$stokFix]);
        }
        DB::table('transaksi')->where('id',$id)->update(['grandtotal'=>$grandtotal]);
    }
}
