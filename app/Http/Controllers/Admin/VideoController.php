<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Group;
use App\Models\Level;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function __construct(){
        $this->middleware('adminMiddle');
    }

    public function index(){
        $video = Video::orderBy('prioritas','asc')->get();
        return view('admin.videobelajar.lesson.index', compact('video'));
    }

    public function create($chapter_id){
        $chapter = Chapter::where('id',$chapter_id)->select('id','nama','subject_id')->first();
        return view('admin.videobelajar.lesson.create', compact('chapter'));
    }

    public function store(Request $request) {
        $check=Video::where('chapter_id',$request->chapter_id)->where('slug',$request->slug)->count();
        if($check==0){
            $this->validate($request,[
                'chapter_id' => ['required'],
                'nama' => ['required'],
                'slug' => ['required'],
                'prioritas' => ['required'],
                'video' => ['required'],
                'durasi' => ['required'],
                'deskripsi' => ['required'],
                'pengajar' => ['required'],
                'icon' => ['required','mimes:jpeg,jpg,png'],
            ]);
            $iconName = time().'.'.$request->icon->getClientOriginalExtension();
            $request->icon->storeAs('public/admin/video/lessonicon', $iconName);
            $iconPath = "admin/video/lessonicon/".$iconName;
            Video::create([
                'chapter_id' => $request->chapter_id,
                'nama' => $request->nama,
                'slug' => $request->slug,
                'prioritas' => $request->prioritas,
                'video' => $request->video,
                'durasi' => $request->durasi,
                'deskripsi' => $request->deskripsi,
                'pengajar' => $request->pengajar,
                'icon' => $iconPath,
                'penjelasan' => $request->penjelasan,
                'modul' => $request->modul,
            ]);
            return redirect()->route('admin.video.chapter.lesson',$request->chapter_id);
        }
        else{
            $message = "Maaf, slug url tidak boleh sama dengan yang sudah ada.";
            return redirect()->route('admin.video.lesson.create',$request->chapter_id)->with('message', $message);;
        }
    }

    public function edit($id) {
        $select = Chapter::pluck('nama','id');
        $video = Video::findOrFail($id);
        return view('admin.videobelajar.lesson.edit', compact('video','select'));
    }
    
    public function update($id, Request $request) {
        if($request->slug==null){
            $video = Video::findOrFail($id);
            $this->validate($request,[
                'chapter_id' => ['required'],
                'nama' => ['required'],
                'video' => ['required'],
                'durasi' => ['required'],
                'deskripsi' => ['required'],
                'pengajar' => ['required'],
                'prioritas' => ['required'],
                'penjelasan' => ['required'],
                'modul' => ['required'],
                'status' => ['required'],
                'icon' => ['mimes:jpg,png'],
            ]);
            $video->update($request->except('icon','slug'));
            if($request->has('icon')){
                Storage::delete('public/'.$video->icon);
                $iconName = time().'.'.$request->icon->getClientOriginalExtension();
                $request->icon->storeAs('public/admin/video/lessonicon', $iconName);
                $iconPath = "admin/video/lessonicon/".$iconName;
                $video->update(['icon'=>$iconPath]);
            }
            return redirect()->route('admin.video.chapter.lesson',$request->chapter_id);
        }else{
            $check=Video::where('chapter_id',$request->chapter_id)->where('slug',$request->slug)->count();
            if($check==0){
                $video = Video::findOrFail($id);
                $this->validate($request,[
                    'chapter_id' => ['required'],
                    'nama' => ['required'],
                    'video' => ['required'],
                    'durasi' => ['required'],
                    'deskripsi' => ['required'],
                    'pengajar' => ['required'],
                    'prioritas' => ['required'],
                    'penjelasan' => ['required'],
                    'modul' => ['required'],
                    'status' => ['required'],
                    'icon' => ['mimes:jpg,png'],
                    'slug' => ['required'],
                ]);
                $video->update($request->except('icon'));
                if($request->has('icon')){
                    Storage::delete('public/'.$video->icon);
                    $iconName = time().'.'.$request->icon->getClientOriginalExtension();
                    $request->icon->storeAs('public/admin/video/lessonicon', $iconName);
                    $iconPath = "admin/video/lessonicon/".$iconName;
                    $video->update(['icon'=>$iconPath]);
                }
                return redirect()->route('admin.video.chapter.lesson',$request->chapter_id);
            }
            else{
                $message = "Maaf, slug url tidak boleh sama dengan yang sudah ada.";
                return redirect()->route('admin.video.lesson.edit',$id)->with('message', $message);;
            }
        }

    }
}
