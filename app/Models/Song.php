<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Album;
use App\Models\Country;
use App\Models\Singer;
use App\Models\Comment;
use App\Models\Author;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'lyric',
        'view',
        'file_name',
        'author_id',
        'country_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function albums()
    {
        return $this->belongsToMany(Album::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function singer()
    {
        return $this->hasMany(Singer::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function userRate()
    {
        return $this->hasMany(User::class, 'rates');
    }
}
