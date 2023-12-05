<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Album</title>
    <style>
     body, h1, h2, h3, p, ul {
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f8f8;
}

.header {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
}

.header ul {
    list-style: none;
    padding: 0;
    display: flex;
    justify-content: center;
}

.header li {
    margin: 0 20px;
}

.header a {
    text-decoration: none;
    color: #fff;
}

.content {
    padding-top: 100px;
    text-align: center;
}

.album-details {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.album-details h1 {
    color: #333;
}

.album-details p {
    color: #555;
}

.song-list {
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

th, td {
    border: 1px solid #ddd;
    padding: 15px;
    text-align: left;
}

th {
    background-color: #333;
    color: #fff;
}

td {
    background-color: #f5f5f5;
}

.delete-song {
    background-color: #d9534f;
    color: #fff;
    padding: 8px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 5px;
    text-decoration: none;
}

.delete-song:hover {
    background-color: #c9302c;
}

.show-song {
    background-color: #5bc0de;
    color: #fff;
    padding: 8px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
}

.show-song:hover {
    background-color: #46b8da;
}

.back-to-albums {
    display: inline-block;
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border-radius: 4px;
    text-decoration: none;
    margin-top: 20px;
}

.back-to-albums:hover {
    background-color: #555;
}
    </style>
</head>

<body>
    <header class="header">
        <nav>
            <!-- Your navigation content here -->
        </nav>
    </header>
    <div class="content">
        <h1>Edit Album</h1>
        <form action="{{ route('albums.update', ['album' => $album->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Album Name:</label>
                <input type="text" name="name" id="name" value="{{ $album->name }}">
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="text" name="year" id="year" value="{{ $album->year }}">
            </div>
            <div class="form-group">
                <label for="times_sold">Times Sold:</label>
                <input type="text" name="times_sold" id="times_sold" value="{{ $album->times_sold }}">
            </div>
            <div class="form-group">
                <label>Songs in the Album:</label>
                <div class="checkbox-group">
                    @foreach ($songs as $song)
                    <label>
                        <input type="checkbox" name="songs[]" value="{{ $song->id }}" id="song{{ $song->id }}"
                            @if(in_array($song->id, $album->songs->pluck('id')->toArray())) checked @endif>
                        {{ $song->title }}
                    </label>
                    @endforeach
                </div>
            </div>

            <!-- Add other fields as needed -->
            <input type="hidden" name="redirect_to" value="{{ route('albums.index') }}">
            <button type="submit" class="button">Update</button>
            <a class="song-details" href="{{ route('albums.index') }}">Back to Albums</a>
        </form>

    </div>
</body>

</html>