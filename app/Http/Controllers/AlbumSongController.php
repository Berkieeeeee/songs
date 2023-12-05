<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Album;

class AlbumSongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(string $album, string $song)
    {
        try {
            // Detach the specified song from the album
            $result = $album->songs()->detach($song->id);
    
            dd($result); // Add this line to see the result of the detach operation
    
            return redirect()->route('albums.show', $album->id)->with('success', 'Song removed from the album successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to remove the song from the album. ' . $e->getMessage());
        }
    }
}
