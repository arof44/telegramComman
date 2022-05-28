<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
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
       $barangHabis = DB::table('barang as br')
        ->join('barang_stock as brst','brst.id_barang','=','br.id')
        ->where('brst.type','k')
        ->where('br.id','!=',0)
        ->select('brst.qty as qty','br.nama as nama_barang','br.id as id_barang')
        ->groupBy('br.id')
        ->limit(5)
        ->get();
        $keluarArr =  json_decode(json_encode($barangHabis),true);
        foreach ($keluarArr as $key => $value) {
            $qty = DB::table('barang_stock')->where('id_barang',$value['id_barang'])->sum('qty');
            $keluarArr[$key]['qty'] = $qty;
        }
        $hasilBarangHabis = $this->phparraysort($keluarArr,array('qty'));
        $barangBaru = DB::table('barang as br')
        ->join('barang_stock as brst','brst.id_barang','=','br.id')
        ->where('brst.type','m')
        ->where('br.id','!=',0)
        ->select('br.nama as nama_barang','brst.created_at')
        ->groupBy('br.id')
        ->orderBy('brst.created_at','DESC')
        ->limit(5)
        ->get();
        return view('dashboard.home',compact('hasilBarangHabis','barangBaru'));
    }

       public function phparraysort($Array, $SortBy=array(), $Sort = SORT_REGULAR) {
        if (is_array($Array) && count($Array) > 0 && !empty($SortBy)) {
                $Map = array();                     
                foreach ($Array as $Key => $Val) {
                    $Sort_key = '';                         
                                    foreach ($SortBy as $Key_key) {
                                            $Sort_key .= $Val[$Key_key];
                                    }                
                    $Map[$Key] = $Sort_key;
                }
                asort($Map, $Sort);
                $Sorted = array();
                foreach ($Map as $Key => $Val) {
                    $Sorted[] = $Array[$Key];
                }
                return array_reverse($Sorted);
        }
        return $Array;
    }
}
