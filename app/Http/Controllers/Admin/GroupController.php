<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use App\Models\Level;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __construct(){
        $this->middleware('adminMiddle');
    }

    public function index(){
        $group = Group::orderBy('prioritas','asc')->get();
        return view('admin.videobelajar.group.index', compact('group'));
    }

    public function create(){
        $select = Level::pluck('nama', 'id');
        return view('admin.videobelajar.group.create', compact('select'));
    }

    public function store(Request $request) {
        $check=Group::where('slug',$request->slug)->count();
        if($check==0){
            $this->validate($request,[
                'level_id' => ['required'],
                'nama' => ['required'],
                'slug' => ['required'],
                'prioritas' => ['required'],
            ]);
            Group::create($request->all());
            return redirect()->route('admin.video.group.index');
        }
        else{
            $message = "Maaf, slug url tidak boleh sama dengan yang sudah ada.";
            return redirect()->route('admin.video.group.create')->with('message', $message);;
        }
    }


    public function edit($id) {
        $select = Level::pluck('nama', 'id');
        $group = Group::findOrFail($id);
        return view('admin.videobelajar.group.edit', compact('group','select'));
    }
    
    public function update($id, Request $request) {
        $group = Group::findOrFail($id);
        $this->validate($request,[
            'level_id' => ['required'],
            'nama' => ['required'],
            'status' => ['required'],
        ]);
        $group->update($request->all());
        return redirect()->route('admin.video.group.index');
    }
    
   
}
