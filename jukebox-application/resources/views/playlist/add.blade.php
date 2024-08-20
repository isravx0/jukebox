<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Songs to Playlist</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-white">Add Songs to Playlist</h1>

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

        <!-- Form to select songs -->
        <form action="{{ route('playlists.add', $playlist) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="songs" class="text-white">Select Songs:</label>
                <select name="songs[]" id="songs" class="form-control" multiple required>
                    @foreach ($songs as $song)
                        @if(!$playlist->songs->contains($song))
                            <option value="{{ $song->id }}">{{ $song->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Songs</button>
            <a href="{{ route('playlist.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
