<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $playlist->name }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center text-black">╰─〔❨✧ {{ $playlist->name }} ✧❩〕─╯</h2>

        <a href="{{ route('playlist.index', $playlist) }}">
            <i class="fa fa-chevron-circle-left" style="margin-bottom: 10px; font-size:30px; color:black;"></i>
        </a>

        <h2 class="text-black">Songs:</h2>
        @if ($playlist->songs->isEmpty())
            <p class="text-black text-center">「 ✦ No songs in this playlist. ✦ 」</p>
        @else
            <ul class="text-black">
                @foreach ($playlist->songs as $song)
                    <li> ✰ {{ $song->name }} - {{ $song->author }}.
                        <form action="{{ route('playlist.song.delete', ['playlist' => $playlist, 'song' => $song]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this song from the playlist?')">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif

        <a class="btn btn-primary mt-3" href="{{ route('playlist.index') }}">Back to Playlists</a>
    </div>
</body>
</html>
