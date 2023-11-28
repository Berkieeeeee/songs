<!-- resources/views/albums/index.blade.php -->

@extends('layouts.app') {{-- Use your layout file --}}
@section('content')

<h1>All Albums</h1>

@foreach ($albums as $album)
    <div>
        <h3>{{ $album->name }}</h3>
        {{-- Add other album details as needed --}}
    </div>
@endforeach

@endsection
