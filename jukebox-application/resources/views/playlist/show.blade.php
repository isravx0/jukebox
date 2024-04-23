<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
            background-color: #5BBCFF;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: white;
        }
        h2{
            font-size: 20px;
            margin-bottom: 10px;
            color: #FFFAB7;
        }
        p{
            color: white;
            text-align: center;
            font-style: italic;

        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 5px;
            color: white;
        }
        a {
            color: #007bff; /* Link color */
            text-decoration: none; /* Remove underline */
        }
        a:hover {
            text-decoration: underline; /* Add underline on hover */
        }
        .delete-button {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
        .back-button{
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1> ╰─〔❨✧ {{ $playlist->name }} ✧❩〕─╯</h1>

        <a href="{{ route('playlist.index', $playlist) }}">
            <i class="fa fa-chevron-circle-left" style="margin-bottom: 10px; font-size:36px; color: white;"></i>
        </a>

        <h2>Songs:</h2>
        @if ($playlist->songs->isEmpty())
            <p> 「 ✦ No songs in this playlist. ✦ 」</p>
        @else
            <ul>
                @foreach ($playlist->songs as $song)
                    <li> ✰ {{ $song->name }} - {{ $song->author }}.
                        <form action="{{ route('playlist.song.delete', ['playlist' => $playlist, 'song' => $song]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="delete-button" type="submit" onclick="return confirm('Are you sure you want to delete this song from the playlist?')">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif

        <a class="back-button" href="{{ route('playlist.index') }}">Back to Playlists</a>
    </div>
</body>
</html>
