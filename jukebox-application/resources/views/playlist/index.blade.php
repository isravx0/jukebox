@extends('layout.app')

@section('title', 'Playlists Overzicht')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('playlists.create') }}" class="btn btn-primary mb-3">Create New Playlist</a>
    <a href="{{ route('home.index') }}" class="btn btn-secondary mb-3">Back</a>

    @if(!empty($playlists))
        @foreach($playlists as $playlist)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('playlists.show', $playlist) }}">{{ $playlist['name'] }}</a>
                    </h5>
                    <form action="{{ route('playlists.destroy', $playlist) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this playlist?')">Delete</button>
                        <a href="{{ route('playlists.edit', $playlist) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('playlists.add', $playlist) }}" class="btn btn-success btn-sm">Add Songs</a>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        <p>No playlists found.</p>
    @endif
@endsection
