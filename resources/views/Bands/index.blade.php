@extends('layouts.app')

@section('content')

<h1>All Bands</h1>

@foreach ($bands as $band)
    <div>
        <h3>{{ $band->name }}</h3>
        {{-- Add other band details as needed --}}
    </div>
@endforeach

@endsection
