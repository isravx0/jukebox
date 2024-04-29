<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $song->name }} - Gedetailleerde weergave</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            color: grey;
            padding: 20px;
            background-color: #FFFAB7;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #5BBCFF;
            margin-bottom: 10px;
        }
        p {
            margin-bottom: 8px;
        }
        strong {
            font-weight: bold;
            color: black;
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
        <h1>{{ $song->name }}</h1>
        <p><strong>Auteur:</strong> {{ $song->author }}</p>
        @php
            $minutes = floor($song->duration / 60); // Bereken het aantal volledige minuten
            $seconds = $song->duration % 60; // Bereken het aantal overgebleven seconden
        @endphp
        <p><strong>Duur:</strong> {{ $minutes }}:{{ sprintf("%02d", $seconds) }}</p>
        <p><strong>Jaar van release:</strong> {{ $song->releaseyear }}</p>
        <p><strong>Beschrijving:</strong> {{ $song->description }}</p>
        <a href="{{ route('songs.index') }}" class="back-button">Back</a>

    </div>
</body>
</html>
