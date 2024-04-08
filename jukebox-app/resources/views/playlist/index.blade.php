<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlists Overzicht</title>
    <style>
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #8B93FF;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, p{
            color: white;
        }
        h2 {
            color: #FF71CD;;
        }
        h3 {
            color: white;
        }
        a {
            text-decoration: none; /* Removes underline */
            color: inherit; /* Inherits the color from its parent */
        }
        section {
            background-color: #5755FE;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        section:hover {
            transform: translateY(-5px);
        }
        .create-playlist-link {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .create-playlist-link:hover {
            background-color: #0056b3;
        }

        .success-message {
            background-color: #28a745;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .delete-playlist-btn, .edit-playlist-btn, .add-song-btn{
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }

        .delete-playlist-btn:hover {
            background-color: #c82333;
        }

        .edit-playlist-btn {
            background-color: #ffc107;
            color: black;
        }

        .edit-playlist-btn:hover {
            background-color: #e0a800;
        }

        .add-song-btn{
            background-color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Playlists Overzicht</h1>

        <!-- Success message after creating or updating or deleting a playlist -->
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <!-- Link to create a new playlist -->
        <a class="create-playlist-link" href="{{ route('playlists.create') }}">Create New Playlist</a>

        @foreach($playlists as $playlist)
            <section>
                <a href="{{ route('playlists.show', $playlist) }}">
                    <h2>{{ $playlist->name }}</h2>
                </a>

                <form action="{{ route('playlists.destroy', $playlist) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete-playlist-btn" type="submit" onclick="return confirm('Are you sure you want to delete this playlist?')">Delete</button>
                    <a class="edit-playlist-btn" href="{{ route('playlists.edit', $playlist) }}">Edit</a>
                    <a href="{{ route('playlists.add', $playlist) }}" class="add-song-btn">Add</a>
                </form>

            </section>
        @endforeach


    </div>
</body>
</html>
