<!-- resources/views/albums/edit.blade.php -->

@extends('layouts.app')

@section('content')

<h1>Edit Album</h1>

<form action="/albums/{{ $album->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Album Name:</label>
        <input type="text" name="name" id="name" value="{{ $album->name }}">
    </div>
    {{-- Add other album fields as needed --}}
    <button type="submit" class="button">Update</button>
    <a class="album-details" href="{{ route('albums.index') }}">Back to Albums</a>
</form>

</div>
</div>
@endsection
