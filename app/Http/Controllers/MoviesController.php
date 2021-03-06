<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Http\Requests\MovieRequest;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->input('title');
        $take = $request->input('take', 10);
        $skip = $request->input('skip', 0);

        if ($search) {

            return Movie::search($search, $take, $skip);

        } 
        return response()->json([
            'data' => Movie::take($take)->skip($skip)->latest()->get(),
            'total' => Movie::count()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        return Movie::create($request->only([
            'title',
            'director',
            'duration',
            'releaseDate',
            'imageUrl',
            'genre',  
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return $movie;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function update(MovieRequest $request, Movie $movie)
    {
        $movie->update($request->only([
            'title',
            'director',
            'duration',
            'releaseDate',
            'imageUrl', 
            'genre', 
        ]));
        return $movie;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return $movie;
    }
}
