@extends('layout.app')

@section('title', 'Overview')

@section('content')
    <div class="container">
        <!-- Personalized Greeting -->
        <h1 class="text-center my-4">
            Welcome to Your Music App{{ Auth::check() ? ', ' . Auth::user()->name : '' }}!
        </h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Genres Overview -->
        <div class="section mb-5">
            <h2 class="section-title text-primary">All Genres</h2>
            <div class="list-group">
                @foreach ($genres as $genre)
                    <a href="{{ route('genres.show', $genre) }}" class="list-group-item list-group-item-action list-group-item-info">
                        {{ $genre->name }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Songs Overview -->
        <div class="section mb-5">
            <h2 class="section-title text-success">Latest Songs</h2>
            <div class="list-group">
                @foreach ($songs as $song)
                    <div class="list-group-item list-group-item-success">
                        <h5 class="mb-1">{{ $song->name }}</h5>
                        <p class="mb-1">Artist: {{ $song->author }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Playlists Overview -->
        <div class="section mb-5">
            <h2 class="section-title text-warning">Latest Playlists</h2>
            <div class="list-group">
                @foreach ($playlists as $playlist)
                    <a href="{{ route('playlists.show', $playlist) }}" class="list-group-item list-group-item-action list-group-item-warning">
                        <h5 class="mb-1">{{ $playlist->name }}</h5>
                        <p class="mb-1">Number of Songs: {{ $playlist->songs()->count() }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
