<?php

namespace App\Http\Controllers;

use App\Models\Videotag;
use App\Models\Video;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Group;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class VideoController extends Controller
{
    function __construct()
    {
      $this->middleware('auth')->only('tags');
    }

    public function index()
    {
        $level = Level::orderBy('prioritas','asc')->where('status','1')->get();
        return view('video.index', compact('level'));
    }

    public function level($slug)
    {
        $check=Level::where('slug',$slug)->where('status','1')->count();
        if($check==0){
            return redirect()->route('video.index');
        }
        else{
            $level=Level::select('id','nama')->where('slug',$slug)->first();
            $level_id=$level->id;
            $group = Group::orderBy('prioritas','asc')->where('level_id',$level_id)->where('status','1')->get();
            Level::where('id', $level_id)->increment('tayang', 1);
            return view('video.level', compact('group','level'));
        }
    }

    public function search(Request $request)
    {
        $lesson=Video::where('nama','LIKE','%'.$request->kunci.'%')->get();
        $chapter=Chapter::where('nama','LIKE','%'.$request->kunci.'%')->get();
        $subject=Subject::where('nama','LIKE','%'.$request->kunci.'%')->get();
        $kunci=$request->kunci;
        return view('video.search', compact('lesson','chapter','subject','kunci'));
    }

    public function subject($level, $group, $subject)
    {
        $level=Level::where('slug',$level)->where('status','1')->select('id')->first();
        $level_id=$level->id;
        $check=$level->count();
        if($check==0){
            return redirect()->route('video.index');
        }
        else{
            $group=Group::where('level_id',$level_id)->where('slug',$group)->where('status','1')->select('id')->first();
            $group_id=$group->id;
            $check2=$group->count();
            if($check2==0){
                return redirect()->route('video.index');
            }
            else{
                $subject=Subject::where('group_id',$group_id)->where('slug',$subject)->where('status','1')->select('id')->first();
                $subject_id=$subject->id;
                $check3=$group->count();
                if($check3==0){
                    return redirect()->route('video.index');
                }
                else{
                    $subject=Subject::where('id',$subject_id)->first();
                    $chapter = Chapter::orderBy('prioritas','asc')->where('subject_id',$subject_id)->where('status','1')->get();
                    Group::where('id', $group_id)->increment('tayang', 1);
                    Subject::where('id', $subject_id)->increment('tayang', 1);
                    return view('video.subject', compact('subject','chapter'));
                }
            }
            
        }
    }

    public function lesson($level, $group, $subject, $chapter, $lesson)
    {
        $level=Level::where('slug',$level)->where('status','1')->select('id')->first();
        if($level==null){
            return redirect()->route('video.index');
        }
        else{
            $level_id=$level->id;
            $group=Group::where('level_id',$level_id)->where('slug',$group)->where('status','1')->select('id')->first();
            if($group==null){
                return redirect()->route('video.index');
            }
            else{
                $group_id=$group->id;
                $subject=Subject::where('group_id',$group_id)->where('slug',$subject)->where('status','1')->select('id')->first();
                $check3=$group->count();
                if($subject==null){
                    return redirect()->route('video.index');
                }
                else{
                    $subject_id=$subject->id;
                    $chapter=Chapter::where('subject_id',$subject_id)->where('slug',$chapter)->where('status','1')->select('id')->first();
                    if($chapter==null){
                        return redirect()->route('video.index');
                    }
                    else{
                        $chapter_id=$chapter->id;
                        $videocek=Video::where('chapter_id',$chapter_id)->where('slug',$lesson)->where('status','1')->first();
                        if($videocek==null){
                            return redirect()->route('video.index');
                        }
                        else{
                            $video_id=$videocek->id;
                            $video=Video::where('id',$video_id)->first();
                            $prev = Video::where('chapter_id',$chapter_id)->where('prioritas', '<', $video->prioritas)->max('prioritas');
                            $next = Video::where('chapter_id',$chapter_id)->where('prioritas', '>', $video->prioritas)->min('prioritas');
                            
                            $data2=Chapter::where('id',$chapter_id)->first();
                            $prevchapter_id = Chapter::where('subject_id',$subject_id)->where('prioritas', '<', $data2->prioritas)->max('prioritas');
                            $prevchapter=Chapter::where('subject_id',$subject_id)->where('prioritas',$prevchapter_id)->select('id','subject_id')->first();
                            $nextchapter_id = Chapter::where('subject_id',$subject_id)->where('prioritas', '>', $data2->prioritas)->min('prioritas');
                            $nextchapter=Chapter::where('subject_id',$subject_id)->where('prioritas',$nextchapter_id)->select('id','subject_id')->first();

                            $chapter=Video::where('chapter_id',$chapter_id)->where('status','1')->orderBy('prioritas','asc')->get();
                            $subject=Chapter::where('subject_id',$subject_id)->where('status','1')->orderBy('prioritas','asc')->get();
                            
                            if (Auth::user()){
                                $ditandai=Videotag::where('video_id',$video_id)->where('user_id',Auth::user()->id)->get()->count();
                            }else{
                                $ditandai=0;
                            }
                            Chapter::where('id', $chapter_id)->increment('tayang', 1);
                            Video::where('id', $video_id)->increment('tayang', 1);
                            return view('video.lesson', compact('video','chapter','subject','prev','next','prevchapter','nextchapter','ditandai'));
                        }

                    }
                }
            }
            
        }
    }

    public function navigation($chapter, $priority)
    {
        $video=Video::where('chapter_id',$chapter)->where('prioritas',$priority)->where('status','1')->first();
        return redirect()->route('video.lesson',[$video->chapter->subject->group->level->slug, $video->chapter->subject->group->slug, $video->chapter->subject->slug, $video->chapter->slug, $video->slug]);
    }

    public function tag(Request $request){
        Videotag::create($request->all());
        if (Auth::check()){
            User::where('id', Auth::user()->id)->increment('xp', 1);
        }
    }

    public function like(Request $request){
        Video::where('id', $request->video_id)->increment('suka', 1);
        if (Auth::check()){
            User::where('id', Auth::user()->id)->increment('xp', 1);
        }
    }

    public function tags(){
        $tag=Videotag::where('user_id',Auth::user()->id)->get();
        return view('video.tag', compact('tag'));
    }

    public function deletetag (Request $request){
        $tag = Videotag::find($request->id); 
        $tag->delete();
        return redirect()->route('video.tags'); 
    }
}
