<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Group;
use App\Models\Level;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubjectController extends Controller
{
    public function __construct(){
        $this->middleware('adminMiddle');
    }

    public function index(){
        $subject = Subject::orderBy('prioritas','asc')->get();
        return view('admin.videobelajar.subject.index', compact('subject'));
    }

    public function create(){
        $select = Group::pluck('nama', 'id');
        $selectkategori = array("IPA"=>"IPA","IPS"=>"IPS","Bahasa"=>"Bahasa");
        return view('admin.videobelajar.subject.create', compact('select','selectkategori'));
    }

    public function store(Request $request) {
        $check=Subject::where('slug',$request->slug)->count();
        if($check==0){
            $this->validate($request,[
                'group_id' => ['required'],
                'nama' => ['required'],
                'slug' => ['required'],
                'prioritas' => ['required'],
                'deskripsi' => ['required'],
                'icon' => ['required','mimes:jpeg,jpg,png'],
                'pengajar' => ['required'],
                'gelarpengajar' => ['required'],
                'fotopengajar' => ['required','mimes:jpeg,jpg,png'],
                'kategori' => ['required'],
                'durasi' => ['required'],
            ]);
            $iconName = time().'.'.$request->icon->getClientOriginalExtension();
            $request->icon->storeAs('public/admin/video/icon', $iconName);
            $iconPath = "admin/video/icon/".$iconName;
            $fotoName = time().'.'.$request->fotopengajar->getClientOriginalExtension();
            $request->fotopengajar->storeAs('public/admin/video/pengajar', $fotoName);
            $fotoPath = "admin/video/pengajar/".$fotoName;  
            Subject::create([
                'group_id' => $request->group_id,
                'nama' => $request->nama,
                'slug' => $request->slug,
                'prioritas' => $request->prioritas,
                'deskripsi' => $request->deskripsi,
                'icon' => $iconPath,
                'pengajar' => $request->pengajar,
                'gelarpengajar' => $request->gelarpengajar,
                'fotopengajar' => $fotoPath,
                'kategori' => $request->kategori,
                'durasi' => $request->durasi,
            ]);
            return redirect()->route('admin.video.subject.index');
        }
        else{
            $message = "Maaf, slug url tidak boleh sama dengan yang sudah ada.";
            return redirect()->route('admin.video.subject.create')->with('message', $message);;
        }
    }


    public function edit($id) {
        $select = Group::pluck('nama', 'id');
        $subject = Subject::findOrFail($id);
        $selectkategori = array("IPA"=>"IPA","IPS"=>"IPS","Bahasa"=>"Bahasa");
        return view('admin.videobelajar.subject.edit', compact('subject','select','selectkategori'));
    }
    
    public function update($id, Request $request) {
        $subject = Subject::findOrFail($id);
        $this->validate($request,[
            'group_id' => ['required'],
            'nama' => ['required'],
            'prioritas' => ['required'],
            'deskripsi' => ['required'],
            'icon' => ['mimes:jpg,png'],
            'pengajar' => ['required'],
            'gelarpengajar' => ['required'],
            'fotopengajar' => ['mimes:jpg,png'],
            'kategori' => ['required'],
            'durasi' => ['required'],
            'status' => ['required'],
        ]);

        $subject->update($request->except('icon','fotopengajar'));
        if($request->has('icon')){
            Storage::delete('public/'.$subject->icon);
            $iconName = time().'.'.$request->icon->getClientOriginalExtension();
            $request->icon->storeAs('public/admin/video/icon', $iconName);
            $iconPath = "admin/video/icon/".$iconName;
            $subject->update(['icon'=>$iconPath]);
        }

        if($request->has('fotopengajar')){
            Storage::delete('public/'.$subject->fotopengajar);
            $fotoName = time().'.'.$request->fotopengajar->getClientOriginalExtension();
            $request->fotopengajar->storeAs('public/admin/video/pengajar', $fotoName);
            $fotoPath = "admin/video/pengajar/".$fotoName; 
            $subject->update(['fotopengajar'=>$fotoPath]);
        }

        return redirect()->route('admin.video.subject.index');
    }

    public function chapter($subject_id){
        $chapter = Chapter::where('subject_id',$subject_id)->orderBy('prioritas','asc')->get();
        $subject = Subject::where('id',$subject_id)->select('id','nama','group_id')->first();
        return view('admin.videobelajar.subject.chapter', compact('chapter','subject'));
    }
}
