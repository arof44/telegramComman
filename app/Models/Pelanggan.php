<?php

namespace App\Models;
use DB;
use Carbon\Carbon;
class Pelanggan 
{
	public function get()
    {
    	$data = DB::table('pelanggan')->get();
    	return $data;
    }

    public function create($request)
    {
    	$data = DB::table('pelanggan')->insert([
    		'nama'=>$request->nama,
    		'alamat'=>$request->alamat,
    		'no_tlp'=>$request->no_tlp,
    		'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
    	]);
    	return $data;
    }

    public function update($request,$id)
    {
        $data = DB::table('pelanggan')->where('id',$id)->update([
    		'nama'=>$request->nama,
    		'alamat'=>$request->alamat,
    		'no_tlp'=>$request->no_tlp,
    		'updated_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
    	]);
    	return $data;
    }

    public function delete($id)
    {
    	$data = DB::table('pelanggan')->where('id',$id)->delete();
        $barang = DB::table('transaksi')->where('id_pelanggan',$id)->update(['id_pelanggan'=>0]);
        return $data;
    }
}
