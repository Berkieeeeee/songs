<form method="POST" action="{{ route('albums.update', $album->id) }}">
    @csrf
    @method('PUT')

    <!-- Andere velden voor album bewerken -->

    <label for="song_id">Add Song to Album:</label>
    <select name="song_id" id="song_id">
        @foreach ($songs as $song)
            <option value="{{ $song->id }}">{{ $song->name }}</option>
        @endforeach
    </select>

    <button type="submit">Update Album</button>
</form>
