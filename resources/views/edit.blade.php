<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Song</title>
    <style>
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
        padding-top: 70px;
        text-align: center;
    }

    .form-container {
        max-width: 800px;
        margin: 0 auto;
        text-align: left;
    }

    .form-container form {
        background-color: #fff;
        padding: 20px;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-group input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .btn-primary {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .content
    {
        max-width: 800px;
        margin: 0 auto;
        text-align: left;
        background-color: #fff;
        padding: 200px;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0);
    }

    .song-details {
        display: inline-block;
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border-radius: 4px;
        text-decoration: none;
        margin-top: 10px;
    }

    .song-details a:hover {
        background-color: #555;
    }

    .btn-primary:hover {
        background-color: #555;
    }

    .alert {
        margin-top: 20px;
        padding: 10px;
        border-radius: 4px;
    }

    .alert-danger {
        background-color: #f44336;
        color: #fff;
    }

    .alert-success {
        background-color: #4CAF50;
        color: #fff;
    }
    .button {
        display: inline-block;
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border-radius: 4px;
        text-decoration: none;
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <header class="header">
        <nav>
        </nav>
    </header>
    <div class="content">
        <h1>Edit Song</h1>
        <form action="{{route('songs.update', ['song' => $song->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Song Title:</label>
                <input type="text" name="title" id="title" value="{{ $song->title }}">
            </div>
            <div class="form-group">
                <label for="singer">Artist:</label>
                <input type="text" name="singer" id="singer" value="{{ $song->singer }}">
            </div>
            <div class="form-group">
            <label for="albums">Albums:</label><br>
            @foreach ($albums as $album)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="album_{{ $album->id }}" name="albums[]"
                        value="{{ $album->id }}" @if ($song->albums->contains($album->id)) checked @endif>
                    <label class="form-check-label" for="album_{{ $album->id }}">
                        {{ $album->name }}
                    </label>
                </div>
            @endforeach
        </div>
            <button type="submit" class="button">Update</button>
            <a class="song-details" href="{{ route('songs.index') }}">Back to Songs</a>
        </form>
    </div>
</body>

</html>