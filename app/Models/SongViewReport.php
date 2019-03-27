<?php

namespace App\Models;

use App\Models\Song;
use Illuminate\Database\Eloquent\Model;

class SongViewReport extends Model
{
    protected $fillable = [
        'date',
        'song_id',
        'view',
    ];

    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}
