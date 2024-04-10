<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $playlist->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #333; /* Text color */
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333; /* Heading color */
        }
        h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333; /* Heading color */
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 5px;
        }
        a {
            color: #007bff; /* Link color */
            text-decoration: none; /* Remove underline */
        }
        a:hover {
            text-decoration: underline; /* Add underline on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $playlist->name }}</h1>

        <h2>Songs:</h2>
        @if ($playlist->songs->isEmpty())
            <p>No songs in this playlist.</p>
        @else
            <ul>
                @foreach ($playlist->songs as $song)
                    <li>{{ $song->name }} - {{ $song->author }}</li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('playlist.index') }}">Back to Playlists</a>
    </div>
</body>
</html>
