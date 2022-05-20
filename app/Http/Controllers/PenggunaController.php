<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
class PenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pengguna = new Pengguna();
        $data = $pengguna->get();
        return view('dashboard.pengguna.index',compact('data'));
    }

    public function create(Request $request)
    {
        $pengguna = new Pengguna();
        $input = $pengguna->create($request);
        if(!$input){
            return redirect()->back()->with('error','Gagal add pengguna');
        }
        return redirect()->back()->with('success','Success add pengguna');
    }

    public function update(Request $request,$id)
    {
        $pengguna = new Pengguna();
        $input = $pengguna->update($request,$id);
        if(!$input){
            return redirect()->back()->with('error','Gagal update pengguna');
        }
        return redirect()->back()->with('success','Success update pengguna');
    }

    public function delete($id)
    {
        $pengguna = new Pengguna();
        $input = $pengguna->delete($id);
        if(!$input){
            return redirect()->back()->with('error','Gagal delete pengguna');
        }
        return redirect()->back()->with('success','Success delete pengguna');
    }
    
}
