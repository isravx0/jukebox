<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $genre->name }} Songs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
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
    </style>
</head>
<body>

    <div class="container">

        <h1>{{ $genre->name }} Songs</h1>

        <a href="{{ route('genres.index', $genre) }}">
            <i class="fa fa-chevron-circle-left" style="margin-bottom: 10px; font-size:36px; color: white;"></i>
        </a>

        @foreach($songs as $song)
            <section>
                {{ $song->name }} - {{ $song->author }}
            </section>
        @endforeach


    </div>
</body>
</html>
