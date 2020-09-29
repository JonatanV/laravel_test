<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        img{
            width: 470px;
            height: 672px;
        }
    </style>
    <h1>
        Vem är du själv då {{ $name }}?
    </h1>
    <img src="{{URL::asset('img/TORKEL.png')}}" alt="">
</body>
</html>