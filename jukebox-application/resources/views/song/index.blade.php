@extends('layout.app')

@section('title', 'Songs Overview')

@section('content')
    <div class="container mt-5">
        <!-- Page Title -->
        <h1 class="text-center mb-4">Songs Overview</h1>

        <!-- Songs List -->
        @foreach($songs as $song)
            <div class="card mb-3 list-group-item-info">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('songs.show', $song) }}" class="text-dark">{{ $song->name }}</a>
                    </h5>
                    <p class="card-text">Artist: {{ $song->author }}</p>
                </div>
            </div>
        @endforeach

        <!-- No songs message -->
        @if($songs->isEmpty())
            <p class="text-center">No songs available.</p>
        @endif
    </div>
@endsection
