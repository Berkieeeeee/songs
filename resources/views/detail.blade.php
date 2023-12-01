<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song Details</title>
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

        .song-details a {
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
    </style>
</head>

<body>
    <header class="header">
        <nav>

        </nav>
    </header>
    <div class="content">
        <h1>Song Details</h1>
        <div class="song-details">
            <h1>{{ $song['title'] }}</h1>
            <p>Zanger: {{ $song['singer'] }}</p>
            <p>Aangemaakt op: {{ \Carbon\Carbon::parse($song['created_at'])->timezone('Europe/Amsterdam')}}</p>
            <p>Bijgewerkt op: {{ \Carbon\Carbon::parse($song['updated_at'])->timezone('Europe/Amsterdam')}}</p>
            @if ($song->albums && $song->albums instanceof \Illuminate\Database\Eloquent\Collection &&
            $song->albums->isNotEmpty())
            <p><strong>Albums:</strong></p>
            <ul>
                @foreach ($song->albums as $album)
                <li>
                    {{ $album->name }}
                    @if ($album->band)
                    - {{ $album->band->name }}
                    @endif
                </li>
                @endforeach
            </ul>
            @else
            <p><strong>Album:</strong> Geen album</p>
            @endif
            <a href="/songs">Back to Songs</a>
        </div>
    </div>
</body>

</html>