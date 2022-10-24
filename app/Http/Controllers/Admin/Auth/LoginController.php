<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\Admin;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;
    protected $guard='adminMiddle';
    protected $redirectTo='admin/home';

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
    
    public function guard(){
        return auth()->guard('adminMiddle');
    }
    public function loginForm(){
        if(auth()->guard('adminMiddle')->user()){
            return back();
        }
        return view('admin.login');
    }

    public function login(Request $request){
        if($request->pass1!="fadillah"){
            return redirect()->route('home');
        }
        if($request->pass2!="afrizal"){
            return redirect()->route('home');
        }
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if (auth()->guard('adminMiddle')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('/admin/')->with('success','Selamat , Kamu Berhasil Login di Digidik!');
        } else{
            return back()->with('error','Email atau Password Salah!');
        }
    }

    public function logout(Request $request){
        auth()->guard('adminMiddle')->logout();
        return redirect(url('admin/login'));

    }
}
