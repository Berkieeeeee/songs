<?php

use App\Http\Controllers\AlbumSongController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandController;

Route::get('/home', function () {
    return view('home');
});

// Songs Routes
Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
Route::post('/songs/create', [SongController::class, 'store'])->name('songs.store');
Route::get('/songs/{id}', [SongController::class, 'show'])->name('songs.show');
Route::delete('/songs/{id}', [SongController::class, 'destroy'])->name('songs.destroy');
Route::get('/songs/{song}/edit', [SongController::class, 'edit'])->name('songs.edit');
Route::put('/songs/{song}', [SongController::class, 'update'])->name('songs.update');

// Bands Routes
Route::get('/bands', [BandController::class, 'index'])->name('bands.index');
Route::get('/bands/create', [BandController::class, 'create'])->name('bands.create');
Route::post('/bands/create', [BandController::class, 'store'])->name('bands.store');
Route::get('/bands/{band}', [BandController::class, 'show'])->name('bands.show');
Route::delete('/bands/{band}', [BandController::class, 'destroy'])->name('bands.destroy');
Route::get('/bands/{id}/edit', [BandController::class, 'edit'])->name('bands.edit');
Route::put('/bands/{id}', [BandController::class, 'update'])->name('bands.update');

// Albums Routes
Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');
Route::post('/albums/create', [AlbumController::class, 'store'])->name('albums.store');
Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('albums.show');
Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('albums.destroy');
Route::get('/albums/{id}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
Route::put('/albums/{id}', [AlbumController::class, 'update'])->name('albums.update');
// overige

Route::delete('/albums/{album}/songs/{song}', [AlbumController::class, 'destroy'])->name('songs.destroy');

