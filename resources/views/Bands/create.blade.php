@extends('layouts.app')

@section('content')

<h1>Create a New Band</h1>

<div class="form-container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('bands.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Band Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Band</button>
        <a class="band-details" href="{{ route('bands.index') }}">Back to Bands</a>
    </form>
</div>

@endsection