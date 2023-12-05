<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album Details</title>
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

        .album-details a {
            display: inline-block;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 10px;
        }

        .album-details a:hover {
            background-color: #555;
        }

        .song-list {
            max-width: 800px;
            margin: 20px auto;
            text-align: left;
        }

        .delete-song {
            background-color: #d9534f;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .delete-song:hover {
            background-color: #c9302c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
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
    </style>
</head>

<body>
    <header class="header">
        <nav>

        </nav>
    </header>
    <div class="content">
        <h1>Album Details</h1>
        @if ($album)
        <div class="album-details">
            <h1>{{ $album->name }}</h1>
            <p>Year: {{ $album->year }}</p>
            <p>Times Sold: {{ $album->times_sold }}</p>

            <!-- Band of the Album -->
            <h2>Band</h2>
            @if ($album->band)
            <p>Band Name: <a href="/bands/{{ $album->band->id }}">{{ $album->band->name }}</a></p>
            @else
            <p>No band found for this album.</p>
            @endif

            <!-- Songs in the Album -->
            <div class="song-list">
                <h2>Songs</h2>
                @if (count($album->songs) > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Song Title</th>
                            <th>Singer</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($album->songs as $song)
                        <tr>
                            <td>{{ $song->title }}</td>
                            <td>{{ $song->singer }}</td>
                            <td>
                                <!-- Delete button -->
                                <form
                                    action="{{ route('songs.destroy', ['album' => $album->id, 'song' => $song->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-song">Delete Song</button>
                                </form>

                                <!-- Show button -->
                                <a href="{{ route('songs.show', $song->id) }}" class="delete-song">Show</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>No songs found for this album.</p>
                @endif
            </div>

            <a href="/albums">Back to Albums</a>
        </div>
        @else
        <p>Album not found.</p>
        @endif
    </div>
</body>

</html>