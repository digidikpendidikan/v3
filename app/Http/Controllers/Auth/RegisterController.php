<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'hp' => ['required', 'min:10','max:16'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $headers = [
            'Content-Type' => 'application/json',
            'AccessToken' => 'key',
            'Authorization' => 'Bearer dk_afbb5015742341b69c755d3a4d8fc126',
        ];
        $client = new Client([
            'base_uri' => 'http://103.179.87.147:3001',
            'headers' => $headers,
            // default timeout 5 detik
            'timeout'  => 5,
        ]);
         
        $response = $client->request('POST', '/api/v1/messages', [
            'json' => [
                "recipient_type" => "individual", 
                "to" => $data['hp'], 
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
                                    "value" => "1. Selamat ".$data['name'].", kamu telah terdaftar di website Digidik - Bimbel Online Gratis dengan username ".$data['username'].".\n2. Selalu akses website digidik.id setiap kamu ingin belajar dan meraih prestasi. 100% Gratis.\n3. Save kontak ini ya.\n4. Join juga grup telegram pelajar Digidik.\n- Admin Digidik"
                                ] 
                            ], 
                        "action" => [
                                        "buttons" => [
                                        [
                                            "type" => "link", 
                                            "parameter" => [
                                                "title" => "Website Digidik", 
                                                "value" => "https://digidik.id/" 
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
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'hp' => $data['hp'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function registered(Request $request, $user)
    {
        // return redirect('/')->with('success','Selamat '. $user->name . ', Kamu Telah Terdaftar di Digidik!');
        return redirect('/')->with('success','Selamat, Kamu Telah Terdaftar di Digidik!');
    }

}
