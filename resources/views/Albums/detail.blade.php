<td class="bands-actions">
    <form action="/bands/{{ $song['id'] }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" onclick="return confirm('Are you sure you want to delete this song?')">Delete</button>
    </form>
</td>
