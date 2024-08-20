@extends('layout.app')

@section('title', $genre->name . ' Songs')

@section('content')
    <div class="container mt-5">
        <!-- Genre Title -->
        <h1 class="text-center mb-4">{{ $genre->name }} Songs</h1>

        <!-- Back Button -->
        <div class="mb-3">
            <a href="{{ route('genres.index', $genre) }}" class="btn btn-secondary">
                <i class="fa fa-chevron-circle-left mr-2"></i>Back to Genres
            </a>
        </div>

        <!-- List of Songs -->
        @foreach($songs as $song)
            <div class="card mb-3 list-group-item-info">
                <div class="card-body">
                    <h5 class="card-title">{{ $song->name }}</h5>
                    <p class="card-text">Artist: {{ $song->author }}</p>
                </div>
            </div>
        @endforeach

        <!-- No songs message -->
        @if($songs->isEmpty())
            <p class="text-center">No songs found in this genre.</p>
        @endif
    </div>
@endsection
