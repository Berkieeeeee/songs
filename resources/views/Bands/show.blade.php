<h1>{{ $band->name }}</h1>
<h2>Albums:</h2>
<ul>
    @foreach($albums as $album)
        <li>{{ $album->name }}</li>
    @endforeach
</ul>
