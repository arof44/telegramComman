<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
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
        $tersedia = DB::table('barang')->where('stock','>',5)->count();
        $segera = DB::table('barang')->where('stock','<',5)->count();
        $habis = DB::table('barang')->where('stock','=',0)->count();

        $preStart = Carbon::now('Asia/Jakarta')->format('Y');
        $start =  $preStart.'-01-01';
        $end = Carbon::parse($start)->addMonths(12)->format('Y-m-d');
       // return $end;
        $range = CarbonPeriod::create($start, $end);
        $dataBulan = [];
        foreach ($range as $key => $date) {
            $masuk = DB::table('transaksi as trs')
                    ->join('barang_stock as bst','bst.id_transaksi','=','trs.id')
                    ->where('trs.tanggal',$date->format('Y-m-d'))
                    ->where('bst.type','m')
                    ->sum('trs.grandtotal');
            $keluar = DB::table('transaksi as trs')
                    ->join('barang_stock as bst','bst.id_transaksi','=','trs.id')
                    ->where('trs.tanggal',$date->format('Y-m-d'))
                    ->where('bst.type','k')
                    ->sum('trs.grandtotal');
            $dataBulan[$key]['Y'] = $date->format('Y');
            $dataBulan[$key]['m'] = $date->format('m');
            $dataBulan[$key]['d'] = $date->format('d');
            $dataBulan[$key]['masuk'] = $masuk;
            $dataBulan[$key]['keluar'] = $masuk;
        }
        return view('dashboard.home',compact('hasilBarangHabis','barangBaru','tersedia','segera','habis','dataBulan'));
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
