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
        $pemasok->create($request);
        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        $pemasok = new Pemasok();
        $pemasok->update($request,$id);
        return redirect()->back();
    }

    public function delete($id)
    {
        $pemasok = new Pemasok();
        $pemasok->delete($id);
        return redirect()->back();
    }
}
