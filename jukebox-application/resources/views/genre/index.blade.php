@extends('layout.app')

@section('title', 'Genres Overview')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Genres Overview</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Genres List -->
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
    </div>
@endsection
