<!-- resources/views/albums/show.blade.php -->

@extends('layouts.app')

@section('content')

<h1>Album Details</h1>

<div class="album-details">
    <h1>{{ $album->name }}</h1>
    {{-- Add other album details as needed --}}
    <a href="/albums">Back to Albums</a>
</div>

@endsection
