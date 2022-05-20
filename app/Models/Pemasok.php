<?php

namespace App\Models;
use DB;
use Carbon\Carbon;
class Pemasok 
{
	public function get()
    {
    	$data = DB::table('pemasok')->where('id','!=',0)->get();
    	return $data;
    }

    public function create($request)
    {
    	$data = DB::table('pemasok')->insert([
    		'nama'=>$request->nama,
    		'alamat'=>$request->alamat,
    		'no_tlp'=>$request->no_tlp,
    		'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
    	]);
    	return $data;
    }

    public function update($request,$id)
    {
        $data = DB::table('pemasok')->where('id',$id)->update([
    		'nama'=>$request->nama,
    		'alamat'=>$request->alamat,
    		'no_tlp'=>$request->no_tlp,
    		'updated_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
    	]);
    	return $data;
    }

    public function delete($id)
    {
    	$data = DB::table('pemasok')->where('id',$id)->delete();
        $barang = DB::table('transaksi')->where('id_pemasok',$id)->update(['id_pemasok'=>0]);
        return $data;
    }
}
