<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        a {
            text-decoration: none; /* Removes underline */
            color: inherit; /* Inherits the color from its parent */
        }
        .container {

            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333333;
        }
        .navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .nav-links {
            display: flex;
            align-items: center;
        }
        .nav-links a {
            color: #ffffff;
            text-decoration: none;
            margin-right: 20px;
        }
        .login-btn , .signup-btn, .logout-btn{
            background-color: #28a745;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-btn:hover {
            background-color: #218838;
        }
        .section {
            margin-bottom: 30px;
        }
        .section-title {
            font-size: 20px;
            color: #333333;
            margin-bottom: 10px;
        }
        .item {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .item h2 {
            margin-bottom: 5px;
            color: #007bff;
        }
        .item p {
            color: #333333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="navigation">
            <div class="nav-links">
                <a href="{{ route('genres.index') }}">Genres</a>
                <a href="{{ route('playlist.index') }}">Playlists</a>
                <a href="{{ route('songs.index') }}">Songs</a>
            </div>

            <div>
                @guest <!-- Check if user is a guest (not logged in) -->
                    <button class="login-btn" onclick="window.location='{{ route('login') }}'">Login</button>
                    <button class="signup-btn" onclick="window.location='{{ route('register') }}'">Sign Up</button>
                @else <!-- User is logged in -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                @endguest
            </div>

        </div>
        <h1>Welcome to Your Music App!</h1>

        <!-- Genres Overview -->
        <div class="section">
            <h2 class="section-title">Latest Genres</h2>
            @foreach ($genres as $genre)
                <div class="item">
                    <h2><a href="{{ route('genres.show', $genre) }}">{{ $genre->name }}</a></h2>
                </div>
            @endforeach
        </div>

        <!-- Songs Overview -->
        <div class="section">
            <h2 class="section-title">Latest Songs</h2>
            @foreach ($songs as $song)
                <div class="item">
                    <h2>{{ $song->name }}</h2>
                    <p>Artist: {{ $song->author }}</p>
                </div>
            @endforeach
        </div>

        <!-- Playlists Overview -->
        <div class="section">
            <h2 class="section-title">Latest Playlists</h2>
            @foreach ($playlists as $playlist)
                <div class="item">
                    <a href="{{ route('playlists.show', $playlist) }}">
                        <h2>{{ $playlist->name }}</h2>
                    </a>
                    <p>Number of Songs: {{ $playlist->songs()->count() }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
