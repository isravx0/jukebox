<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlists Overzicht</title>
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

        h1, p{
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
        h2 {
            color: #7EA1FF;
            margin-bottom: 5px;
        }
        h3 {
            color: #F7F6BB;
            margin-bottom: 10px;
        }
        a {
            color: #007bff; /* Link color */
            text-decoration: none; /* Remove underline */
        }
        section {
            background-color: #FFFAB7;
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
            margin-top: 10px;
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
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

        <a href="{{ route('home.index') }}" class="back-button" >Back</a>

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
                    <a href="{{ route('playlists.addSongs', $playlist) }}" class="add-song-btn">Add</a>
                </form>

            </section>
        @endforeach

    </div>
</body>
</html>
