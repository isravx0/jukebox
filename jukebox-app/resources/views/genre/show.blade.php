<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $genre->name }} Songs</title>
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
            text-align: center;
            margin-bottom: 20px;
        }
        h2 {
            color: white;
            margin-bottom: 5px;
        }
        h3 {
            color: #FF71CD;
            margin-bottom: 10px;
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
    </style>
</head>
<body>

    <div class="container">

        <h1>{{ $genre->name }} Songs</h1>

        @foreach($songs as $song)
            <section>
                {{ $song->name }} - {{ $song->author }}
            </section>
        @endforeach


    </div>
</body>
</html>
