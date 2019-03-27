<?php

namespace App\Models;

use App\Models\Song;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'song_id',
        'user_id',
        'parent_id',
    ];

    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}
