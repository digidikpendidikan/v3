<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update($id, Request $request) {
        $user = User::findOrFail($id);
        $this->validate($request,[
            'name' => ['required'],
            'hp' => ['required'],
            'foto' => ['mimes:jpg,png'],
            'jk' => ['required'],
            'provinsi' => ['required'],
            'jenjang' => ['required'],
            'sekolah' => ['required'],
            'bio' => ['required'],
        ]);
        
        $user->update($request->except('foto'));
        if($request->has('foto')) {
            Storage::delete('public/'.$user->foto);
            $photoName = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->storeAs('public/users', $photoName);
            $photoPath = "users/".$photoName;  
            $user->update(['foto'=>$photoPath]);
        };
        User::where('id', Auth::user()->id)->increment('xp', 5);
        return redirect()->route('profile.edit',$id);
    }
}
