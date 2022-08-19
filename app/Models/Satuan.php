<?php

namespace App\Models;

use DB;
use Carbon\Carbon;

class Satuan
{
    public function get()
    {
        $data = DB::table('satuan')->where('id','!=',0)->get();
        return $data;
    }

    public function create($request)
    {
        $data = DB::table('satuan')->insert([
            'nama' => $request->nama
        ]);
        return $data;
    }

    public function update($request, $id)
    {
        $data = DB::table('satuan')->where('id', $id)->update([
            'nama' => $request->nama
        ]);
        return $data;
    }

    public function delete($id)
    {
        $data = DB::table('satuan')->where('id', $id)->delete();
        $barang = DB::table('barang')->where('id_satuan', $id)->update(['id_satuan' => 0]);
        return $data;
    }
}
