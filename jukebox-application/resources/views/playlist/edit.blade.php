<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Playlist</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-white">Edit Playlist</h1>

        <!-- Error messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Playlist edit form -->
        <form action="{{ route('playlists.update', $playlist) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="text-white">Playlist Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $playlist->name }}" required>
            </div>
            <button class="btn btn-primary" type="submit">Update Playlist</button>
        </form>

        <!-- Button to delete the playlist -->
        <form action="{{ route('playlists.destroy', $playlist) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this playlist?')">Delete Playlist</button>
        </form>

        <a class="btn btn-secondary mt-3" href="{{ route('playlist.index') }}">Back to Playlists</a>
    </div>
</body>
</html>
