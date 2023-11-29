
<h1>Edit Band</h1>

<form action="/Bands/{{ $Band->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Band Name:</label>
        <input type="text" name="name" id="name" value="{{ $Band->name }}">
    </div>
    <button type="submit" class="button">Update</button>
    <a class="Band-details" href="{{ route('Bands.index') }}">Back to Bands</a>
</form>

</div>
</div>

