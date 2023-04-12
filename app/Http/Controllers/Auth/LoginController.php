<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

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
            $headers = [
                'Content-Type' => 'application/json',
                'AccessToken' => 'key',
                'Authorization' => 'Bearer dk_0e41cc354357479d8c35ae24c5e14ba3',
            ];
            $client = new Client([
                'base_uri' => 'http://http://210.16.65.111:3001',
                'headers' => $headers,
                // default timeout 5 detik
                'timeout'  => 5,
            ]);
             
            $response = $client->request('POST', '/api/v1/messages', [
                'json' => [
                    "recipient_type" => "individual", 
                    "to" => Auth::user()->hp, 
                    "type" => "interactive_dev", 
                    "interactive_dev" => [
                            "header" => [
                                "type" => "text", 
                                "parameter" => [
                                "value" => "DIGIDIK - BIMBEL ONLINE GRATIS" 
                                ] 
                            ], 
                            "body" => [
                                    "type" => "text", 
                                    "parameter" => [
                                        "value" => "1. Selamat ".$data['name'].", kamu telah login di website Digidik - Bimbel Online Gratis dengan username ".$data['username'].".\n2. Selalu akses website digidik.id setiap kamu ingin belajar dan meraih prestasi. 100% Gratis.\n3. Save kontak ini ya.\n4. Join juga grup telegram pelajar Digidik.\n- Admin Digidik"
                                    ] 
                                ], 
                            "action" => [
                                            "buttons" => [
                                            [
                                                "type" => "link", 
                                                "parameter" => [
                                                    "title" => "Link Penting Digidik", 
                                                    "value" => "https://blog.digidik.id/link" 
                                                ] 
                                            ], 
                                            [
                                                        "type" => "link", 
                                                        "parameter" => [
                                                        "title" => "Join Grup Telegram", 
                                                        "value" => "https://t.me/pelajardigidik" 
                                                        ] 
                                                    ] 
                                            ] 
                                        ] 
                        ] 
                ]
            ]);
            $body = $response->getBody();
            $body_array = json_decode($body);
            // print_r($body_array);
            return redirect()->back()->with('success','Selamat, Kamu Berhasil Login di Digidik!');
        }
        return redirect()->route('home')->with(['error' => 'Email/Password Salah! Silakan Coba Login Kembali.']);
    }
}
