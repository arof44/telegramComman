<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satuan;
use Auth;
class SatuanController extends Controller
{
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
    // public function index()
    // {
    //     $satuan = new Satuan();
    //     $data = $satuan->get();
    //     return view('dashboard.barang.index', compact('data'));
    // }

    public function create(Request $request)
    {
        $satuan = new Satuan();
        $input = $satuan->create($request);
        if (!$input) {
            return redirect()->back()->with('error', 'Gagal add Satuan');
        }
        return redirect()->back()->with('success', 'Success add Satuan');
    }

    // public function index()
    // {
    //     $kategori = new Kategori();
    //     $data = $kategori->get();
    //     return view('dashboard.kategori.index', compact('data'));
    // }

    // public function create(Request $request)
    // {
    //     $kategori = new Kategori();
    //     $input = $kategori->create($request);
    //     if (!$input) {
    //         return redirect()->back()->with('error', 'Gagal add kategori');
    //     }
    //     return redirect()->back()->with('success', 'Success add kategori');
    // }

    // public function update(Request $request, $id)
    // {
    //     $kategori = new Kategori();
    //     $input = $kategori->update($request, $id);
    //     if (!$input) {
    //         return redirect()->back()->with('error', 'Gagal update kategori');
    //     }
    //     return redirect()->back()->with('success', 'Success update kategori');
    // }

    // public function delete($id)
    // {
    //     $kategori = new Kategori();
    //     $input = $kategori->delete($id);
    //     if (!$input) {
    //         return redirect()->back()->with('error', 'Gagal delete kategori');
    //     }
    //     return redirect()->back()->with('success', 'Success delete kategori');
    // }
}
