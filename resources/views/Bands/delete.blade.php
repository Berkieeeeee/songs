<td class="song-actions">
    <form action="{{ route('bands.destroy', $band->id) }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" onclick="return confirm('Are you sure you want to delete this band?')">Delete</button>
    </form>
</td>