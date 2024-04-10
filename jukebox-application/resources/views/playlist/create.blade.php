<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Playlist</title>
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
            background-color: #FFFAB7;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #FFFAB7;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #7EA1FF;
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
        <h1>Create Playlist</h1>

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

        <form action="{{ route('playlists.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Playlist Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <button type="submit">Create Playlist</button>
        </form>
    </div>
</body>
</html>
