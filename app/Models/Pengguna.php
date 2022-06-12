<?php

namespace App\Models;
use DB;
use Carbon\Carbon;
class Pengguna 
{
	public function get()
    {
    	$data = DB::table('users')->where('id','!=',0)->get();
    	return $data;
    }

    public function create($request)
    {
        $email = DB::table('users')->where('email',$request->email)->first();
        if($email)
        {
            return false;
        }
    	$data = DB::table('users')->insert([
    		'name'=>$request->name,
    		'email'=>$request->email,
            'role'=>$request->role,
            'username_telegram'=>$request->username_telegram,
    		'password'=>bcrypt($request->password),
    		'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
    	]);
    	return $data;
    }

    public function update($request,$id)
    {
        $data = DB::table('users')->where('id',$id)->update([
    		'name'=>$request->name,
    		'email'=>$request->email,
            'role'=>$request->role,
            'username_telegram'=>$request->username_telegram,
    		'updated_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
    	]);
    	if($request->password != NULL){
    		DB::table('users')->where('id',$id)->update([
    			'password'=>bcrypt($request->password),
    		]);
    	}
    	return $data;
    }

    public function delete($id)
    {
    	$data = DB::table('users')->where('id',$id)->delete();
        $barang = DB::table('barang_stock')->where('id_user',$id)->update(['id_user'=>0]);
        $transaksi = DB::table('transaksi')->where('id_user',$id)->update(['id_user'=>0]);
        return $data;
    }
}
