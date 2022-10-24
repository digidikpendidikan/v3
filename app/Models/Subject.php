<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function group() {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function chapter() {
        return $this->hasMany(Chapter::class, 'subject_id', 'id');
    }
}
