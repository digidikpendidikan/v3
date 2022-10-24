<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function video() {
        return $this->hasMany(Video::class, 'chapter_id', 'id');
    }
}
