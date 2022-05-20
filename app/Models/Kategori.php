<?php

namespace App\Models;
use DB;
use Carbon\Carbon;
class Kategori 
{
	public function get()
    {
    	$data = DB::table('kategori')->where('id','!=',0)->get();
    	return $data;
    }

    public function create($request)
    {
    	$data = DB::table('kategori')->insert([
    		'nama'=>$request->nama,
    		'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
    	]);
    	return $data;
    }

    public function update($request,$id)
    {
        $data = DB::table('kategori')->where('id',$id)->update([
    		'nama'=>$request->nama,
    		'updated_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
    	]);
    	return $data;
    }

    public function delete($id)
    {
        $data = DB::table('kategori')->where('id',$id)->delete();
        $barang = DB::table('barang')->where('id_kategori',$id)->update(['id_kategori'=>0]);
        return $data;
    }
}
