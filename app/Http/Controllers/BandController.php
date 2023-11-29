<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;

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
        // Get the albums associated with the band
        $albums = $band->albums;

        // Pass the band and its albums to the view for display
        return view('bands.show', compact('band', 'albums'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // You can implement band editing logic here
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // You can implement band updating logic here
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // You can implement band deletion logic here
    }
}
