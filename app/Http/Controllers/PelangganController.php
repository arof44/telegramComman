<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
class PelangganController extends Controller
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
        $pelanggan = new Pelanggan();
        $data = $pelanggan->get();
        return view('dashboard.pelanggan.index',compact('data'));
    }

    public function create(Request $request)
    {
        $pelanggan = new Pelanggan();
        $pelanggan->create($request);
        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        $pelanggan = new Pelanggan();
        $pelanggan->update($request,$id);
        return redirect()->back();
    }

    public function delete($id)
    {
        $pelanggan = new Pelanggan();
        $pelanggan->delete($id);
        return redirect()->back();
    }
}
