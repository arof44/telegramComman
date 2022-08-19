<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pemasok;
use App\Models\Satuan;

use Auth;

class BarangController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::check()) {
            $this->middleware('auth');
        }
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

        $pemasok = new Pemasok();
        $dataPemasok = $pemasok->get();

        $satuan = new Satuan();
        $dataSatuan = $satuan->get();
        
        return view('dashboard.barang.index', compact('dataKategori', 'dataPemasok','dataSatuan', 'data'));
    }

    public function create(Request $request)
    {
        $barang = new Barang();
        $input = $barang->create($request);
        if (!$input) {
            return redirect()->back()->with('error', 'Gagal add barang');
        }
        return redirect()->back()->with('success', 'Success add barang');
    }

    public function update(Request $request, $id)
    {
        $barang = new Barang();
        $input = $barang->update($request, $id);
        if (!$input) {
            return redirect()->back()->with('error', 'Gagal update barang');
        }
        return redirect()->back()->with('success', 'Success update barang');
    }

    public function delete($id)
    {
        $barang = new Barang();
        $input = $barang->delete($id);
        if (!$input) {
            return redirect()->back()->with('error', 'Gagal delete barang');
        }
        return redirect()->back()->with('success', 'Success delete barang');
    }
}
