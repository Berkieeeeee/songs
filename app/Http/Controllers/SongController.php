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
            ]);
    
            /*DB::table('songs')->insert([
                'title' => $validatedData['title'],
                'singer' => $validatedData['singer'],
            ]);*/
            //  $song =new Song();
            //  $song -> title =$validatedData['title'];
            //  $song -> singer=$validatedData['singer'];
            //  $song -> save();
            Song::create($validatedData);
    
            return redirect()->route('songs.show')->with('success', 'Song added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('success', 'Song added successfully');
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $songs = DB::table('songs')->get();
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
            ]);
    
            $song = Song::findOrFail($id)->update($validatedData);
            // $song->title = $validatedData['title'];
            // $song->singer = $validatedData['singer'];
            // $song->save();
      
            return redirect()->route('songs.index')->with('success', 'Song updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to update the song');
        }
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Song::destroy($id);
    
        return redirect()->route('songs.index')->with('success', 'Song deleted successfully');
    }
    
}