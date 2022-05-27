<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Transaksi;
use DB;
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
        $trs = new Transaksi();
        $data = $trs->get();
        //return $data['masuk'];
        return view('dashboard.transaksi.index',compact('data'));
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
        $pemasok = DB::table('pemasok')->where('id','!=',0)->get();
        $barang = DB::table('barang')->where('id','!=',0)->get();
        return view('dashboard.transaksi.create_masuk',compact('banyak','pemasok','barang'));
    }

    public function createKeluar($banyak)
    {
        $barang = DB::table('barang')->where('id','!=',0)->get();
        $pengguna = DB::table('users')->where('id','!=',0)->get();
        return view('dashboard.transaksi.create_keluar',compact('banyak','pengguna','barang'));
    }

    public function updateMasuk($id)
    {
        $pemasok = DB::table('pemasok')->where('id','!=',0)->get();
        $barang = DB::table('barang')->where('id','!=',0)->get();
        $data = DB::table('transaksi')->where('id',$id)->first();
        $item = DB::table('transaksi_item')->where('id_transaksi',$id)->get();
        //$banyak = count($item);
        return view('dashboard.transaksi.update_masuk',compact('pemasok','barang','item','data'));
    }

    public function updateKeluar($id)
    {
        $barang = DB::table('barang')->where('id','!=',0)->get();
        $pengguna = DB::table('users')->where('id','!=',0)->get();
        $data = DB::table('transaksi')->where('id',$id)->first();
        $item = DB::table('transaksi_item')->where('id_transaksi',$id)->get();
       // $banyak = count($item);
        return view('dashboard.transaksi.update_keluar',compact('pengguna','barang','item','data'));
    }

    public function report()
    {
        $pemasok = DB::table('pemasok')->get();
        $barang = DB::table('barang')->get();
        return view('dashboard.transaksi.report',compact('pemasok','barang'));
    }

    public function createTranskasiMasuk(Request $request)
    {
        //return $request->all();
        $trs = new Transaksi();
        $data = $trs->createTranskasiMasuk($request);
        return redirect('transaksi')->with('success','Success add transakasi');
    }

    public function updateTranskasiMasuk(Request $request,$id)
    {
        $trs = new Transaksi();
        $data = $trs->updateTranskasiMasuk($request,$id);
        return redirect('transaksi')->with('success','Update add transakasi');
    }

    public function createBarangKeluar(Request $request)
    {
        $trs = new Transaksi();
        $data = $trs->createTranskasiKeluar($request);
        return redirect('transaksi')->with('success','Success add transakasi');
    }

    public function updateTranskasiKeluar(Request $request,$id)
    {
        $trs = new Transaksi();
        $data = $trs->updateTranskasiKeluar($request,$id);
        return redirect('transaksi')->with('success','Update add transakasi');
    }
}
