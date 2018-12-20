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
    public static function search($searchTerm, $take, $skip)
    {
        return response()->json([
            'data' => self::where('title', 'like', "%title%")->take($take)->skip($skip)->latest()->get(),
            'total' => self::where('title', 'like', "%title%")->take($take)->skip($skip)->count()
        ]);
    }
}
