<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;
use Illuminate\Support\Facades\DB;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::all(); 
        return view('show', ['songs' => $songs]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'singer' => 'required|max:255',
                // Add any additional validation rules for other fields
                'albums' => 'array|nullable', // Validation for albums (assuming it's an array)
            ]);
    
            // Create a new song instance
            $song = new Song([
                'title' => $validatedData['title'],
                'singer' => $validatedData['singer'],
                // Add any additional fields you want to set
            ]);
    
            // Save the song
            $song->save();
    
            // Attach albums to the song if provided
            if (isset($validatedData['albums'])) {
                $song->albums()->attach($validatedData['albums']);
            }
    
            return redirect()->route('songs.show')->with('success', 'Song added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to add song. ' . $e->getMessage());
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $songs = DB::table('songs')->get(); // doodstraf
        $song = Song::find($id);
        return view('detail', [
            'songs' => $songs, 
            'song' => $song,  
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        $albums = Album::all();
        return view('edit', compact('song', 'albums'));
    }   


    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'singer' => 'required|max:255',
                // Add any additional validation rules for other fields
                'albums' => 'array|nullable', // Validation for albums (assuming it's an array)
            ]);
    
            $song = Song::findOrFail($id);
    
            // Update the song attributes
            $song->update($validatedData);
    
            // Sync the albums for the song
            if (isset($validatedData['albums'])) {
                $song->albums()->sync($validatedData['albums']);
            } else {
                $song->albums()->sync([]); // If no albums selected, detach all albums
            }
    
            return redirect()->route('songs.index')->with('success', 'Song updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to update the song');
        }
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        // Detach the song from all albums
        $song->albums()->detach();

        return redirect()->route('songs.index')->with('success', 'Song deleted from the album successfully');
    }
    
}