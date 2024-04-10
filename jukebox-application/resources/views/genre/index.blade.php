<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Genres Overzicht</title>
    <style>
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #114232;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, p{
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
        h2 {
            color: #FCDC2A;
            margin-bottom: 5px;
        }
        h3 {
            color: #F7F6BB;
            margin-bottom: 10px;
        }
        section {
            background-color: #99BC85;
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
        <h1>Genres Overzicht</h1>


        @foreach($genres as $genre)
        <section> <h2> {{$genre->id}} > {{$genre->name}} </h2></section>
        @endforeach

    </div>
</body>
</html>