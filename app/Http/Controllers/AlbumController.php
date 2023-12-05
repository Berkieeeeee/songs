<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;
use App\Models\Band;

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
         $bands = Band::all(); // Assuming you have a Band model
     
         return view('albums.create', ['bands' => $bands]);
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $albumId)
    {
        try {
            $album = Album::findOrFail($albumId);

            $request->validate([
                'song_id' => 'required|exists:songs,id',
            ]);

            
            $album->songs()->attach($request->input('song_id'));

            return redirect()->route('albums.show', $albumId)->with('success', 'Song added to the album successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to add the song to the album. ' . $e->getMessage());
        }
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
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'year' => 'required|integer',
                'times_sold' => 'required|integer',
                'songs' => 'array|nullable',
            ]);
    
            $album = Album::findOrFail($id);
    
            // Update the album attributes
            $album->update([
                'name' => $validatedData['name'],
                'year' => $validatedData['year'],
                'times_sold' => $validatedData['times_sold'],
            ]);
    
            // Sync the songs for the album
            if (isset($validatedData['songs'])) {
                // Attach selected songs to the album
                $album->songs()->sync($validatedData['songs']);
            } else {
                // If no songs selected, detach all songs from the album
                $album->songs()->detach();
            }
    
            return redirect()->route('albums.index')->with('success', 'Album updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to update the album. ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($albumId, $songId)
    {
        try {
            $album = Album::findOrFail($albumId);
            $song = Song::findOrFail($songId);

            
            $album->songs()->detach($song->id);

            return redirect()->route('albums.show', $album->id)->with('success', 'Song removed from the album successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to remove the song from the album. ' . $e->getMessage());
        }
    }

}
