<?php

namespace App\Models;
use DB;
use Carbon\Carbon;
use Auth;
use App\Notifications\TelegramNotification;
use Session;
class Transaksi 
{
	public function get()
    {
        
        $keluar = DB::table('transaksi as trs')
        ->join('transaksi_item as trsi','trsi.id_transaksi','=','trs.id')
        ->join('barang_stock as brst','brst.id_transaksi','=','trs.id')
        ->join('users as us','us.id','=','trs.id_user')
        ->where('brst.type','k')
        ->select('trs.*','us.name as nama_pengguna','brst.type','brst.qty as qty')
        ->groupBy('trs.id')
        ->get();
        $keluarArr =  json_decode(json_encode($keluar),true);
        foreach ($keluarArr as $key => $value) {
            $qty = DB::table('barang_stock')->where('id_transaksi',$value['id'])->sum('qty');
            $keluarArr[$key]['qty'] = $qty;
        }
        $masuk = DB::table('transaksi as trs')
        ->join('transaksi_item as trsi','trsi.id_transaksi','=','trs.id')
        ->join('barang_stock as brst','brst.id_transaksi','=','trs.id')
        ->join('pemasok as pms','trs.id_pemasok','=','pms.id')
        ->where('brst.type','m')
        ->select('trs.*','pms.nama as nama_pemasok','brst.qty as qty')
        ->groupBy('trs.id')
        //->groupBy('trs.id')
        ->get();
        $masukArr =  json_decode(json_encode($masuk),true);
        foreach ($masukArr as $key => $value) {
            $qty = DB::table('barang_stock')->where('id_transaksi',$value['id'])->sum('qty');
            $masukArr[$key]['qty'] = $qty;
        }
        $arr = ['masuk'=>$masukArr,'keluar'=>$keluarArr];
        return $arr;
    }

    public function createTranskasiKeluar($request)
    {
        Session::forget('peringatan');
        $no =strtotime(date('Y-m-d H:i:s'));
        $data = DB::table('transaksi')->insertGetId([
            'no_transaksi'=>$no,
            'tanggal'=>$request->date_trs,
            'id_user'=>$request->id_user,
            'keterangan'=>$request->keterangan,
            'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
        ]);
        $grandtotal = 0;
        foreach ($request->id_barang as $key => $value) {
            $barang = DB::table('barang')->where('id',$value)->select('harga','nama')->first();
            $grandtotalSub = $request->qty[$key] * $barang->harga;
            $item = DB::table('transaksi_item')->insert([
                'id_transaksi'=>$data,
                'id_barang'=>$value,
                'qty'=>$request->qty[$key],
                'harga'=>$barang->harga,
                'grandtotal'=>$grandtotalSub,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            DB::table('barang_stock')->insert([
                'id_barang'=>$value,
                'id_transaksi'=>$data,
                'qty'=>$request->qty[$key],
                'type'=>'k',
                'tanggal'=>$request->date_trs,
                'id_user'=>Auth::user()->id,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            $grandtotal += $grandtotalSub;

            //update stock on master 
            $stokMasuk =  DB::table('barang_stock')->where('id_barang',$value)->where('type','m')->sum('qty');
            $stokKeluar =  DB::table('barang_stock')->where('id_barang',$value)->where('type','k')->sum('qty');
            $stokFix = $stokMasuk - $stokKeluar;
            DB::table('barang')->where('id',$value)->update(['stock'=>$stokFix]);
            $this->stockNotif($stokFix,$barang->nama);
        }
        DB::table('transaksi')->where('id',$data)->update(['grandtotal'=>$grandtotal]);
    }

    public function updateTranskasiKeluar($request,$id)
    {
        Session::forget('peringatan');
        DB::table('transaksi')->where('id',$id)->update([
            //'no_transaksi'=>$no,
            'tanggal'=>$request->date_trs,
            'id_user'=>$request->id_user,
            'keterangan'=>$request->keterangan,
            'updated_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
        ]);
        DB::table('transaksi_item')->where('id_transaksi',$id)->delete();
        DB::table('barang_stock')->where('id_transaksi',$id)->delete();
        $grandtotal = 0;
        foreach ($request->id_barang as $key => $value) {
            $barang = DB::table('barang')->where('id',$value)->select('harga','nama')->first();
            $grandtotalSub = $request->qty[$key] * $barang->harga;
            $item = DB::table('transaksi_item')->insert([
                'id_transaksi'=>$id,
                'id_barang'=>$value,
                'qty'=>$request->qty[$key],
                'harga'=>$barang->harga,
                'grandtotal'=>$grandtotalSub,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            DB::table('barang_stock')->insert([
                'id_barang'=>$value,
                'id_transaksi'=>$id,
                'qty'=>$request->qty[$key],
                'type'=>'k',
                'tanggal'=>$request->date_trs,
                'id_user'=>Auth::user()->id,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            $grandtotal += $grandtotalSub;

            //update stock on master 
            $stokMasuk =  DB::table('barang_stock')->where('id_barang',$value)->where('type','m')->sum('qty');
            $stokKeluar =  DB::table('barang_stock')->where('id_barang',$value)->where('type','k')->sum('qty');
            $stokFix = $stokMasuk - $stokKeluar;
            DB::table('barang')->where('id',$value)->update(['stock'=>$stokFix]);
            $this->stockNotif($stokFix,$barang->nama);
        }
        DB::table('transaksi')->where('id',$id)->update(['grandtotal'=>$grandtotal]);
    }

    public function createTranskasiMasuk($request)
    {
        Session::forget('peringatan');
        $no =strtotime(date('Y-m-d H:i:s'));
        $data = DB::table('transaksi')->insertGetId([
            'no_transaksi'=>$no,
            'tanggal'=>$request->date_trs,
            'id_user'=>Auth::user()->id,
            'id_pemasok'=>$request->id_pemasok,
            'keterangan'=>$request->keterangan,
            'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
        ]);
        $grandtotal = 0;
        foreach ($request->id_barang as $key => $value) {
            $barang = DB::table('barang')->where('id',$value)->select('harga','nama')->first();
            $grandtotalSub = $request->qty[$key] * $barang->harga;
            $item = DB::table('transaksi_item')->insert([
                'id_transaksi'=>$data,
                'id_barang'=>$value,
                'qty'=>$request->qty[$key],
                'harga'=>$barang->harga,
                'grandtotal'=>$grandtotalSub,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            DB::table('barang_stock')->insert([
                'id_barang'=>$value,
                'id_transaksi'=>$data,
                'qty'=>$request->qty[$key],
                'type'=>'m',
                'tanggal'=>$request->date_trs,
                'id_user'=>Auth::user()->id,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            $grandtotal += $grandtotalSub;

            //update stock on master 
            $stokMasuk =  DB::table('barang_stock')->where('id_barang',$value)->where('type','m')->sum('qty');
            $stokKeluar =  DB::table('barang_stock')->where('id_barang',$value)->where('type','k')->sum('qty');
            $stokFix = $stokMasuk - $stokKeluar;
            DB::table('barang')->where('id',$value)->update(['stock'=>$stokFix]);
            $this->stockNotif($stokFix,$barang->nama);
        }
        DB::table('transaksi')->where('id',$data)->update(['grandtotal'=>$grandtotal]);
    }

    public function updateTranskasiMasuk($request,$id)
    {
        Session::forget('peringatan');
        DB::table('transaksi')->where('id',$id)->update([
           // 'no_transaksi'=>$no,
            'tanggal'=>$request->date_trs,
            'id_user'=>Auth::user()->id,
            'id_pemasok'=>$request->id_pemasok,
            'keterangan'=>$request->keterangan,
            'updated_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
        ]);
        DB::table('transaksi_item')->where('id_transaksi',$id)->delete();
        DB::table('barang_stock')->where('id_transaksi',$id)->delete();
        $grandtotal = 0;
        foreach ($request->id_barang as $key => $value) {
            $barang = DB::table('barang')->where('id',$value)->select('harga','nama')->first();
            $grandtotalSub = $request->qty[$key] * $barang->harga;
            $item = DB::table('transaksi_item')->insert([
                'id_transaksi'=>$id,
                'id_barang'=>$value,
                'qty'=>$request->qty[$key],
                'harga'=>$barang->harga,
                'grandtotal'=>$grandtotalSub,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            DB::table('barang_stock')->insert([
                'id_barang'=>$value,
                'id_transaksi'=>$id,
                'qty'=>$request->qty[$key],
                'type'=>'m',
                'tanggal'=>$request->date_trs,
                'id_user'=>Auth::user()->id,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
            ]);
            $grandtotal += $grandtotalSub;

            //update stock on master 
            $stokMasuk =  DB::table('barang_stock')->where('id_barang',$value)->where('type','m')->sum('qty');
            $stokKeluar =  DB::table('barang_stock')->where('id_barang',$value)->where('type','k')->sum('qty');
            $stokFix = $stokMasuk - $stokKeluar;
            DB::table('barang')->where('id',$value)->update(['stock'=>$stokFix]);
            $this->stockNotif($stokFix,$barang->nama);
        }
        DB::table('transaksi')->where('id',$id)->update(['grandtotal'=>$grandtotal]);
    }

    public function getReport($type,$data)
    {
        if($type == 'keluar'){
            $pekK = DB::table('transaksi as trs');
            $pekK->join('transaksi_item as trsi','trsi.id_transaksi','=','trs.id');
            $pekK->join('barang_stock as brst','brst.id_transaksi','=','trs.id');
            $pekK->join('users as us','us.id','=','trs.id_user');
            $pekK->where('brst.type','k');
            $pekK->whereBetween('trs.tanggal',[$data->start_date,$data->end_date]);
            if($data->id_user != 'all'){
                $pekK->where('trs.id_user',$data->id_user);
            }
            if($data->id_barang != 'all'){
                $pekK->where('trsi.id_barang',$data->id_user);
            }
            $pekK->select('trs.*','us.name as nama_pengguna','brst.type','brst.qty as qty');
            $pekK->groupBy('trs.id');
            $keluar = $pekK->get();
            $keluarArr =  json_decode(json_encode($keluar),true);
            foreach ($keluarArr as $key => $value) {
                $qty = DB::table('barang_stock')->where('id_transaksi',$value['id'])->sum('qty');
                $keluarArr[$key]['qty'] = $qty;
            }
            $arr = ['masuk'=>[],'keluar'=>$keluarArr];
            return $arr;
        }else{
            $pekM = DB::table('transaksi as trs');
            $pekM->join('transaksi_item as trsi','trsi.id_transaksi','=','trs.id');
            $pekM->join('barang_stock as brst','brst.id_transaksi','=','trs.id');
            $pekM->join('pemasok as pms','trs.id_pemasok','=','pms.id');
            $pekM->where('brst.type','m');
            $pekM->whereBetween('trs.tanggal',[$data->start_date,$data->end_date]);
            if($data->id_pemasok != 'all'){
                $pekM->where('trs.id_pemasok',$data->id_pemasok);
            }
            if($data->id_barang != 'all'){
                $pekM->where('trsi.id_barang',$data->id_user);
            }
            $pekM->select('trs.*','pms.nama as nama_pemasok','brst.qty as qty');
            $pekM->groupBy('trs.id');
            $masuk = $pekM->get();
            $masukArr =  json_decode(json_encode($masuk),true);
            foreach ($masukArr as $key => $value) {
                $qty = DB::table('barang_stock')->where('id_transaksi',$value['id'])->sum('qty');
                $masukArr[$key]['qty'] = $qty;
            }
            $arr = ['keluar'=>[],'masuk'=>$masukArr];
            return $arr;
        }
    }

    public function stockNotif($stock,$nama_barang)
    {
        $result = 'tidak_perlu';
        if($stock < 5)
        {
            $detTele = $this->teleUpdate();
            if($detTele['result'] == 'success'){
                $result = 'perlu';
                $data = ['stock'=>$stock,'nama_barang'=>$nama_barang];
                $this->sendNotifTele($data);
            }elseif($detTele['result'] == 'not_set'){
                $result = $detTele['result'];
                Session::put('peringatan','Usernam telegram anda belum di tentukan!');
            }else{
                $result = $detTele['result'];
                Session::put('peringatan','Usernam telegram anda belum memulai obrolan dengan bot!');
            }
        }
    }

    public function teleUpdate()
    {
        $urlTele = 'https://api.telegram.org/bot5537539950:AAGOCmnfl7NYv9bCWmm7cYANn5w0e8JC3to/getUpdates';
        // persiapkan curl
        $ch = curl_init(); 
        // set url 
        curl_setopt($ch, CURLOPT_URL, $urlTele);
        // return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        // $output contains the output string 
        $output = curl_exec($ch); 
        // tutup curl 
        curl_close($ch);      
        // menampilkan hasil curl
        $arrTele = json_decode($output,true);
        $username = Auth::user()->username_telegram;
        $result = 'not_found';
        $arr = [];
        $arr['result']=$result;
        $arr['username']=$username;
        if($username != NULL)
        {
            $arr = ['result'=>$result,'username'=>$username];
            for ($i=0; $i < count($arrTele['result']); $i++) { 
                $got = $arrTele['result'][$i]['message']['chat']['username'];
                $idTele = $arrTele['result'][$i]['message']['chat']['id'];
                if(isset($got)){
                    if($got == $username){
                        $result = 'success';
                        $arr['result']=$result;
                        $arr['username']=$username;
                        DB::table('users')->where('id',Auth::user()->id)->update(['chat_id'=>$idTele]);
                        break;
                    }
                }
            }
        }else{
            $result = 'not_set';
            $arr['result']=$result;
            $arr['username']=$username;
        }
        return $arr;
    }

    public function sendNotifTele($arr)
    {
         $pesan = [
             'text' => 'Hallo '.Auth::user()->name.' stok '.$arr['nama_barang'].' kamu uda kurang dari 5 yakin '.$arr['stock'].'!',
             'disable_notification' => true
        ];
        Auth::user()->notify(new TelegramNotification($pesan));
    }
}
