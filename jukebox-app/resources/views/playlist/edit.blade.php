<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Playlist</title>
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
            background-color: #8B93FF;
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
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-size: 16px;
            margin-bottom: 8px;
            color: white;
        }
        input[type="text"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #5755FE;
            color: white;
        }
        button[type="submit"], button[type="button"] {
            padding: 10px 20px;
            background-color: #FF71CD;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 10px;
        }
        button[type="submit"]:hover, button[type="button"]:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: white;
            background-color: red;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .error-message ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .error-message li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Playlist</h1>

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

        <!-- Playlist edit form -->
        <form action="{{ route('playlists.update', $playlist) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Playlist Name:</label>
                <input type="text" id="name" name="name" value="{{ $playlist->name }}" required>
            </div>
            <button type="submit">Update Playlist</button>
        </form>

        <!-- Button to delete the playlist -->
        <form action="{{ route('playlists.destroy', $playlist) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this playlist?')">Delete Playlist</button>
        </form>

    </div>
</body>
</html>
