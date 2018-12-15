<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'director',
        'imageUrl',
        'duration',
        'releaseDate',
        'genre',
    ];
    public static function search($searchTerm)
    {
        $movies = Movie::where('title','like','%' . $searchTerm . '%')->get();
        return $movies;
    }
}
