<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;
use App\Models\Bands;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $albums = Album::all(); 

    return view('albums.index', compact('albums'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        $songs = $album->songs;
        return view('albums.show', compact('album', 'songs'));
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        $songs = Song::all();
        return view('albums.edit', compact('album', 'songs'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
