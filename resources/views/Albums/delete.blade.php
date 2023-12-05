<td class="album-actions">
    <form action="/albums/{{ $album['id'] }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" onclick="return confirm('Are you sure you want to delete this song?')">Delete</button>
    </form>
</td>
