<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home');
});


Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/songs/{id}', [SongController::class, 'show'])->name('songs.show');
Route::get('/create', [SongController::class, 'create'])->name('songs.create');
Route::post('/create', [SongController::class, 'store'])->name('songs.store');
Route::delete('/songs/{id}', [SongController::class, 'destroy'])->name('songs.destroy');
Route::get('/songs/{id}/edit', [SongController::class, 'edit'])->name('edit');
Route::put('/songs/{id}', [SongController::class, 'update'])->name('songs.update');

Route::get('/Bands', [BandController::class, 'index'])->name('Bands.index');
Route::get('/Bands/{id}', [BandController::class, 'show'])->name('Bands.show');
Route::get('/create', [BandController::class, 'create'])->name('Bands.create');
Route::post('/create', [BandController::class, 'store'])->name('Bands.store');
Route::delete('/Bands/{id}', [BandController::class, 'destroy'])->name('Bands.destroy');
Route::get('/Bands/{id}/edit', [BandController::class, 'edit'])->name('edit');
Route::put('/Bands/{id}', [BandController::class, 'update'])->name('Bands.update');

Route::get('/Albums', [AlbumController::class, 'index'])->name('Albums.index');
Route::get('/Albums/{id}', [AlbumController::class, 'show'])->name('Albums.show');
Route::get('/create', [AlbumController::class, 'create'])->name('Albums.create');
Route::post('/create', [AlbumController::class, 'store'])->name('Albums.store');
Route::delete('/Albums/{id}', [AlbumController::class, 'destroy'])->name('Albums.destroy');
Route::get('/Albums/{id}/edit', [AlbumController::class, 'edit'])->name('edit');
Route::put('/Albums/{id}', [AlbumController::class, 'update'])->name('Albums.update');




























































































































































































































































































