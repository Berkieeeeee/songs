<!-- resources/views/albums/index.blade.php -->

@extends('layouts.app')

@section('content')

<h1>All Albums</h1>

@foreach ($albums as $album)
    <div>
        <h3>{{ $album->name }}</h3>
        {{-- Add other album details as needed --}}
    </div>
@endforeach

@endsection
