<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasok;
class PemasokController extends Controller
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
        $pemasok = new Pemasok();
        $data = $pemasok->get();
        return view('dashboard.pemasok.index',compact('data'));
    }

    public function create(Request $request)
    {
        $pemasok = new Pemasok();
        $input = $pemasok->create($request);
        if(!$input){
            return redirect()->back()->with('error','Gagal add pemasok');
        }
        return redirect()->back()->with('success','Success add pemasok');
    }

    public function update(Request $request,$id)
    {
        $pemasok = new Pemasok();
        $input = $pemasok->update($request,$id);
        if(!$input){
            return redirect()->back()->with('error','Gagal add pemasok');
        }
        return redirect()->back()->with('success','Success add pemasok');
    }

    public function delete($id)
    {
        $pemasok = new Pemasok();
        $input = $pemasok->delete($id);
        if(!$input){
            return redirect()->back()->with('error','Gagal add pemasok');
        }
        return redirect()->back()->with('success','Success add pemasok');
    }
}
