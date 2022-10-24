<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function level() {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function subject() {
        return $this->hasMany(Subject::class, 'group_id', 'id');
    }
}
