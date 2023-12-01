<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandController;

Route::get('/home', function () {
    return view('home');
});

// Songs Routes
Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/songs/{id}', [SongController::class, 'show'])->name('songs.show');
Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
Route::post('/songs/create', [SongController::class, 'store'])->name('songs.store');
Route::delete('/songs/{id}', [SongController::class, 'destroy'])->name('songs.destroy');
Route::get('/songs/{id}/edit', [SongController::class, 'edit'])->name('songs.edit');
Route::put('/songs/{id}', [SongController::class, 'update'])->name('songs.update');

// Bands Routes
Route::get('/bands', [BandController::class, 'index'])->name('bands.index');
Route::get('/bands/create', [BandController::class, 'create'])->name('bands.create');
Route::post('/bands/create', [BandController::class, 'store'])->name('bands.store');
Route::get('/bands/{band}', [BandController::class, 'show'])->name('bands.show');
Route::delete('/bands/{id}', [BandController::class, 'destroy'])->name('bands.destroy');
Route::get('/bands/{id}/edit', [BandController::class, 'edit'])->name('bands.edit');
Route::put('/bands/{id}', [BandController::class, 'update'])->name('bands.update');

// Albums Routes
Route::get('/albums', [AlbumController::class, 'index'])->name('Albums.index');
Route::get('/albums/{id}', [AlbumController::class, 'show'])->name('Albums.show');
Route::get('/albums/create', [AlbumController::class, 'create'])->name('Albums.create');
Route::post('/albums/create', [AlbumController::class, 'store'])->name('Albums.store');
Route::delete('/albums/{id}', [AlbumController::class, 'destroy'])->name('Albums.destroy');
Route::get('/albums/{id}/edit', [AlbumController::class, 'edit'])->name('Albums.edit');
Route::put('/albums/{id}', [AlbumController::class, 'update'])->name('Albums.update');
