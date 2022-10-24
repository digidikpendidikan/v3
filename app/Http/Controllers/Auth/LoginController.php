<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'usernamelogin' => 'required|string',
            'passwordlogin' => 'required|string|min:8',
        ]);
        $remember=$request->remember ? true : false;

        $loginType = filter_var($request->usernamelogin, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $login = [
            $loginType => $request->usernamelogin,
            'password' => $request->passwordlogin
        ];
    
        if (auth()->attempt($login,$remember)) {
            return redirect()->back()->with('success','Selamat, Kamu Berhasil Login di Digidik!');
        }
        return redirect()->route('home')->with(['error' => 'Email/Password Salah! Silakan Coba Login Kembali.']);
    }
}
