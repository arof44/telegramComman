<?php

namespace App\Models;

use DB;
use Carbon\Carbon;

class Barang
{
    public function get()
    {
        $data = DB::table('barang as br')
            ->join('kategori as kr', 'kr.id', '=', 'br.id_kategori')
            ->join('pemasok as ps', 'ps.id', '=', 'br.id_pemasok')
            ->join('satuan as st', 'st.id', '=', 'br.id_satuan')
            ->where('br.id', '!=', 0)
            ->select('kr.nama as nama_kategori', 'br.*', 'ps.nama as nama_pemasok', 'br.*', 'st.nama as nama_satuan', 'br.*')
            ->orderBy('br.created_at', 'ASC')
            ->get();
        return $data;
    }

    public function create($request)
    {
        $data = DB::table('barang')->insert([
            'id_kategori' => $request->id_kategori,
            'id_pemasok' => $request->id_pemasok,
            'id_satuan' => $request->id_satuan,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'created_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
        ]);
        return $data;
    }

    public function update($request, $id)
    {
        $data = DB::table('barang')->where('id', $id)->update([
            'id_kategori' => $request->id_kategori,
            'id_pemasok' => $request->id_pemasok,
            'id_satuan' => $request->id_satuan,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'updated_at' => Carbon::now('Asia/Jakarta')->toDateTimeString()
        ]);
        return $data;
    }

    public function delete($id)
    {
        $data = DB::table('barang')->where('id', $id)->delete();
        $barang = DB::table('barang_stock')->where('id_barang', $id)->update(['id_barang' => 0]);
        $transaksi = DB::table('transaksi_item')->where('id_barang', $id)->update(['id_barang' => 0]);
        return $data;
    }
}
