<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function daftarNasabah(Request $request)
    {
        $cekEmail = DB::table('users')->where('email',$request->email)->first();
        if($cekEmail){
            return redirect()->back()->with('error','email yang anda masukkan sudah terdaftar!');
        }
        $daftar = DB::table('users')->insertGetId([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>'nasabah',
            'password'=>bcrypt($request->password),
            'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
        ]);

        $user = DB::table('nasabah')->insert([
                'nama'=>$request->name,
                'id_user'=>$daftar,
                'alamat'=>$request->alamat,
                'phone'=>$request->phone,
                'kelompok'=>$request->kelompok,
                'jenis_trs'=>$request->jenis_trs,
                'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
            ]);

        if($user){
            $login = User::find($daftar);
            Auth::login($login);
            return redirect('dashboard');
        }else{
            return redirect()->back()->with('error','terjadi kesalahan!');
        }
    }

    public function loginNasabah(Request $request){
        $cekEmail = DB::table('users')->where('email',$request->email)->first();
        if($cekEmail){
            if(Hash::check($request->password, $cekEmail->password))
            {  
                $user = User::find($cekEmail->id);
                Auth::login($user);
                $role = $cekEmail->role;
                return redirect('dashboard');
            }else{
                 return redirect()->back()->with('error','password salah!');
            }
        }else{
            return redirect()->back()->with('error','email tidak terdaftar!');
        }
    }
}
