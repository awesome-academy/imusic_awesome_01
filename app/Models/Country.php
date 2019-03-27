<?php

namespace App\Models;

use App\Models\Song;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
