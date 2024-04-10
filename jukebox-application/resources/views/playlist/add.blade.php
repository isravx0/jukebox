<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Songs to Playlist</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #5BBCFF;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: white;
        }
        a {
            text-decoration: none; /* Removes underline */
            color: inherit; /* Inherits the color from its parent */
        }
        button[type="submit"], .back-btn {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: green;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover .back-btn:hover{
            background-color: #0056b3;
        }
        .back-btn {
            background-color: #5755FE;

        }
        label {
            color: white;
            margin-bottom: 8px;
        }
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: 	#FFFAB7;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Songs to Playlist</h1>

        <!-- Error messages -->
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form to select songs -->
        <form action="{{ route('playlists.addSongs', $playlist) }}" method="POST">
            @csrf
            <div>
                <label for="songs">Select Songs:</label>
                <select name="songs[]" id="songs" multiple required>
                    @foreach ($songs as $song)
                        <option value="{{ $song->id }}">- {{ $song->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Add Songs</button>
            <a href="{{ route('playlist.index') }}" class="back-btn">Back</a>


        </form>
    </div>
</body>
</html>
