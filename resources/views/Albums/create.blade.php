<!-- resources/views/albums/create.blade.php -->

@extends('layouts.app')

@section('content')

<h1>Create a New Album</h1>

<div class="form-container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('albums.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Album Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        {{-- Add other album fields as needed --}}
        <button type="submit" class="btn btn-primary">Add Album</button>
        <a class="album-details" href="{{ route('albums.index') }}">Back to Albums</a>
    </form>
</div>

@endsection
