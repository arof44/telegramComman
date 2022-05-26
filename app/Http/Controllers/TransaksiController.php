<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Trnsaksi;
class TransaksiController extends Controller
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
        return view('dashboard.transaksi.index');
    }

    public function tangkapType(Request $request){
        if($request->type == 'masuk'){
            return redirect('add_transaksi_masuk/'.$request->banyak);
        }else{
            return redirect('add_transaksi_keluar/'.$request->banyak);
        }
    }

    public function createMasuk($banyak)
    {
        return view('dashboard.transaksi.create_masuk',compact('banyak'));
    }

    public function createKeluar($banyak)
    {
        return view('dashboard.transaksi.create_keluar',compact('banyak'));
    }

    public function report()
    {
        return view('dashboard.transaksi.report');
    }
}
