<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
class BarangController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategori = new Kategori();
        $dataKategori = $kategori->get();
        $barang = new Barang();
        $data = $barang->get();
        return view('dashboard.barang.index',compact('dataKategori','data'));
    }

    public function create(Request $request)
    {
        $barang = new Barang();
        $input = $barang->create($request);
        if(!$input){
            return redirect()->back()->with('error','Gagal add barang');
        }
        return redirect()->back()->with('success','Success add barang');
    }

    public function update(Request $request,$id)
    {
        $barang = new Barang();
        $input = $barang->update($request,$id);
        if(!$input){
            return redirect()->back()->with('error','Gagal add barang');
        }
        return redirect()->back()->with('success','Success add barang');
    }

    public function delete($id)
    {
        $barang = new Barang();
        $input = $barang->delete($id);
        if(!$input){
            return redirect()->back()->with('error','Gagal add barang');
        }
        return redirect()->back()->with('success','Success add barang');
    }
}
