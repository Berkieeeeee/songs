
<h1>Edit Band</h1>

<form action="{{ route('bands.update', ['band' => $band->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Band Name:</label>
        <input type="text" name="name" id="name" value="{{ $band->name }}">
    </div>

    <button type="submit" class="button">Update</button>
    <a class="band-details" href="{{ route('bands.index') }}">Back to Bands</a>
</form>

</div>
</div>

