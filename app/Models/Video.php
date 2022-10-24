<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function chapter() {
        return $this->belongsTo(Chapter::class, 'chapter_id', 'id');
    }
    public function videotag() {
        return $this->hasMany(Videotag::class, 'video_id', 'id');
    }
}
