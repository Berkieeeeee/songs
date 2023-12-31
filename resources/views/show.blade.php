<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Songs</title>
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

    .song-list {
        max-width: 800px;
        margin: 0 auto;
        text-align: left;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }


    th,
    td {
        padding: 15px;
        text-align: left;
    }

    .song-actions {
        display: flex;
        justify-content: space-around;

    }

    .song-actions a {
        text-decoration: none;
        padding: 5px 10px;
        background-color: #333;
        color: #fff;
        border-radius: 4px;
    }

    .create-button {
        margin-bottom: 20px;
        text-align: center;
    }

    .create-button a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #333;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
    }

    .button {
        display: inline-block;
        padding: 5px 10px;
        background-color: #333;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
    }
    </style>
</head>

<body>
    <header class="header">
        <nav>
            <ul>
                <li><a href="/home">Home</a></li>
                <li><a href="/songs">Songs</a></li>
                <li><a href="/bands">Bands</a></li>
                <li><a href="/albums">Albums</a></li>
            </ul>
        </nav>
    </header>
    <div class="content">
        <h1>Show Songs</h1>
        <div class="create-button">
            <a href="/songs/create">Create New Song</a>
        </div>
        <div class="song-list">
            <table>
                <thead>
                    <tr>
                        <th>Song Title</th>
                        <th>Artist</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($songs as $song)
                    <tr>
                        <td><a href="/songs/{{ $song['id'] }}">{{ $song['title'] }}</a></td>
                        <td>{{ $song['singer'] }}</td>
                        <td class="song-actions">
                            <form action="/songs/{{ $song['id'] }}/edit" method="GET">
                                @csrf
                                @method('PUT')
                                <button class="button" type="submit">Edit</button>
                            </form>
                            <form action="/songs/{{ $song['id'] }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="song_id" value="{{ $song['id'] }}">
                                <button class="button" type="submit"
                                    onclick="return confirm('Are you sure you want the delete it?')">Delete</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>