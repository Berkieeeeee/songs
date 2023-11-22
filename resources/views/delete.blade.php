<td class="song-actions">
    <form action="/songs/{{ $song['id'] }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" onclick="return confirm('Are you sure you want to delete this song?')">Delete</button>
    </form>
</td>
