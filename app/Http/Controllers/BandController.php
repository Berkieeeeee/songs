<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;
use Illuminate\Support\Facades\DB;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all bands from the database
        $bands = Band::all();
    
        // Pass the bands to the view for display
        return view('bands.index', compact('bands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // You can implement band storage logic here
    }

    /**
     * Display the specified resource.
     */
    public function show(Band $band)
    {
        // Check if the band exists
        if (!$band) {
            return view('bands.show', ['band' => null, 'albums' => []]);
        }
    
        // Explicitly retrieve albums for the band without relying on relationships
        $albums = DB::table('albums')->where('band_id', $band->id)->get();
    
        return view('bands.show', ['band' => $band, 'albums' => $albums]);
    }
     

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Band $band)
    {
        // You can implement band editing logic here
        return view('bands.edit', compact('band'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Band $band)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'genre' => 'required|max:255',
                'founded' => 'required|date',
                'active_till' => 'nullable|date',
            ]);

            $band->update($validatedData);

            return redirect()->route('bands.index')->with('success', 'Band updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to update the band');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Band $band)
    {
        $band->delete();

        return redirect()->route('bands.index')->with('success', 'Band deleted successfully');
    }
}
