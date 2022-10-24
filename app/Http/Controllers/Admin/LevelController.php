<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function __construct(){
        $this->middleware('adminMiddle');
    }

    public function index(){
        $level = Level::orderBy('prioritas','asc')->get();
        return view('admin.videobelajar.level.index', compact('level'));
    }

    public function create(){
        return view('admin.videobelajar.level.create');
    }

    public function store(Request $request) {
        $check=Level::where('slug',$request->slug)->count();
        if($check==0){
            $this->validate($request,[
                'nama' => ['required'],
                'slug' => ['required'],
                'prioritas' => ['required'],
                'deskripsi' => ['required'],
            ]);
            Level::create($request->all());
            return redirect()->route('admin.video.level.index');
        }
        else{
            $message = "Maaf, slug url tidak boleh sama dengan yang sudah ada.";
            return redirect()->route('admin.video.level.create')->with('message', $message);;
        }
    }


    public function edit($id) {
        $level = Level::findOrFail($id);
        return view('admin.videobelajar.level.edit', compact('level'));
    }
    
    public function update($id, Request $request) {
        $level = Level::findOrFail($id);
        $this->validate($request,[
            'nama' => ['required'],
            'prioritas' => ['required'],
            'deskripsi' => ['required'],
            'status' => ['required'],
        ]);
        $level->update($request->all());
        return redirect()->route('admin.video.level.index');
    }
    
   
}
