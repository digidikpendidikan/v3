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

class ChapterController extends Controller
{
    public function __construct(){
        $this->middleware('adminMiddle');
    }

    public function index(){
        $chapter = Chapter::orderBy('prioritas','asc')->get();
        return view('admin.videobelajar.chapter.index', compact('chapter'));
    }

    public function create($subject_id){
        $subject = Subject::where('id',$subject_id)->select('id','nama')->first();
        return view('admin.videobelajar.chapter.create', compact('subject'));
    }

    public function store(Request $request) {
        $check=Chapter::where('subject_id',$request->subject_id)->where('slug',$request->slug)->count();
        if($check==0){
            $this->validate($request,[
                'subject_id' => ['required'],
                'nama' => ['required'],
                'slug' => ['required'],
                'prioritas' => ['required'],
                'deskripsi' => ['required'],
            ]);
            Chapter::create($request->all());
            return redirect()->route('admin.video.subject.chapter',$request->subject_id);
        }
        else{
            $message = "Maaf, slug url tidak boleh sama dengan yang sudah ada.";
            return redirect()->route('admin.video.chapter.create',$request->subject_id)->with('message', $message);;
        }
    }

    public function edit($id) {
        $select = Subject::pluck('id','id');
        $chapter = Chapter::findOrFail($id);
        return view('admin.videobelajar.chapter.edit', compact('chapter','select'));
    }
    
    public function update($id, Request $request) {
        if($request->slug==null){
            $chapter = Chapter::findOrFail($id);
            $this->validate($request,[
                'subject_id' => ['required'],
                'nama' => ['required'],
                'prioritas' => ['required'],
                'deskripsi' => ['required'],
                'status' => ['required'],
            ]);
            $chapter->update($request->except('slug'));
            return redirect()->route('admin.video.subject.chapter',$request->subject_id);
        }else{
            $check=Chapter::where('subject_id',$request->subject_id)->where('slug',$request->slug)->count();
            if($check==0){
                $chapter = Chapter::findOrFail($id);
                $this->validate($request,[
                    'subject_id' => ['required'],
                    'nama' => ['required'],
                    'slug' => ['required'],
                    'prioritas' => ['required'],
                    'deskripsi' => ['required'],
                    'status' => ['required'],
                ]);
                $chapter->update($request->all());
                return redirect()->route('admin.video.subject.chapter',$request->subject_id);
            }
            else{
                $message = "Maaf, slug url tidak boleh sama dengan yang sudah ada.";
                return redirect()->route('admin.video.chapter.edit',$id)->with('message', $message);;
            }
        }

    }

    public function lesson($chapter_id){
        $video = Video::where('chapter_id',$chapter_id)->orderBy('prioritas','asc')->get();
        $chapter = Chapter::where('id',$chapter_id)->select('id','nama','subject_id')->first();
        return view('admin.videobelajar.chapter.lesson', compact('video','chapter'));
    }
}
