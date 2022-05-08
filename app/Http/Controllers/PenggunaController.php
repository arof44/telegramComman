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
        $pengguna->create($request);
        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        $pengguna = new Pengguna();
        $pengguna->update($request,$id);
        return redirect()->back();
    }

    public function delete($id)
    {
        $pengguna = new Pengguna();
        $pengguna->delete($id);
        return redirect()->back();
    }
    
}
