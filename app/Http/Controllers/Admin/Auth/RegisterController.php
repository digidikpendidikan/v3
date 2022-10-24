<?php
  
namespace App\Http\Controllers\Admin\Auth;
  
use Illuminate\Http\Request;
  
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Validator;
use Hash;
use Session;
use App\Models\Admin;
  
class RegisterController extends Controller
{ 
    public function showFormRegister()
    {
        return view('admin.register');
    }
  
    public function register(Request $request)
    {
        if($request->pass1!="fadillah"){
            return redirect()->route('home');
        }
        if($request->pass2!="afrizal"){
            return redirect()->route('home');
        }
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:admins,email',
            'password'              => 'required|confirmed'
        ];
  
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $user = new Admin;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();
  
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('admin.login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('admin.register');
        }
    }
}