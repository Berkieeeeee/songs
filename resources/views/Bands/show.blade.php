
@extends('layouts.app')

@section('content')

<h1>Band Details</h1>

<div class="band-details">
    <h1>{{ $band->name }}</h1>
    {{-- Add other band details as needed --}}
    <a href="/bands">Back to Bands</a>
</div>

@endsection