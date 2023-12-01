<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Band Details</title>
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

        .band-details a {
            display: inline-block;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 10px;
        }

        .band-details a:hover {
            background-color: #555;
        }

        .song-list,
        .album-list {
            max-width: 800px;
            margin: 20px auto;
            text-align: left;
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
        <h1>Band Details</h1>
        @if ($band)
        <div class="band-details">
            <h1>{{ $band->name }}</h1>
            <p>Genre: {{ $band->genre }}</p>
            <p>Founded: {{ $band->founded }}</p>
            <p>Active Till: {{ $band->active_till }}</p>

            <!-- Albums of the Band -->
            <div class="album-list">
                <h2>Albums</h2>
                @if (count($band->albums) > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Album Title</th>
                            <th>Year</th>
                            <th>Times Sold</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($band->albums as $album)
                        <tr>
                            <td><a href="/albums/{{ $album->id }}">{{ $album->name }}</a></td>
                            <td>{{ $album->year }}</td>
                            <td>{{ $album->times_sold }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>No albums found for this band.</p>
                @endif
            </div>

            <a href="/bands">Back to Bands</a>
        </div>
        @else
        <p>Band not found.</p>
        @endif
    </div>
</body>

</html>