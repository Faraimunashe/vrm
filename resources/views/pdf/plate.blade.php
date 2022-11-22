<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #pic:{
            margin-left: 20px;
            margin-right: 20px;
            text-align: center;
            border-radius: 4px;
            border-width: 3px;
        }
    </style>
</head>
<body>
    <!-- Jumbotron -->
    <div id="#pic"
        class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/003.webp');"
        >
        <img src="{{ public_path('things/assets/img/arms.jpeg') }}" style="width: 20%">

        <h1 class="mb-3 h2">{{$data->number}}</h1>

        <p>powered by CVR</p>
    </div>
</body>
</html>
