<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\Admin;
use GuzzleHttp\Client;

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
            $headers = [
                'Content-Type' => 'application/json',
                'AccessToken' => 'key',
                'Authorization' => 'Bearer dk_0e41cc354357479d8c35ae24c5e14ba3',
            ];
            $client = new Client([
                'base_uri' => 'http://210.16.65.111:3001',
                'headers' => $headers,
                // default timeout 5 detik
                'timeout'  => 5,
            ]);
             
            $response = $client->request('POST', '/api/v1/messages', [
                'json' => [
                    "recipient_type" => "individual", 
                    "to" => "6281322273798", 
                    "type"=> "text",
                    "text"=> [
                        "body"=> "Admin ".$request->email." login ke sistem."
                    ]
                ]
            ]);
            $body = $response->getBody();
            $body_array = json_decode($body);
            // print_r($body_array);
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
