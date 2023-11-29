@extends('layouts.app')

@section('content')

<div class="container">
    <h1>All Bands</h1>
    @forelse ($bands as $band)
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title">{{ $band->name }}</h3>
                <p class="card-text"><strong>Genre:</strong> {{ $band->genre }}</p>
                <p class="card-text"><strong>Formed In:</strong> {{ $band->formed_in }}</p>
                {{-- Add other band details as needed --}}
                <a href="{{ route('bands.show', $band->id) }}" class="btn btn-primary">View Details</a>
            </div>
        </div>
    @empty
        <p>No bands available.</p>
    @endforelse
</div>

@endsection