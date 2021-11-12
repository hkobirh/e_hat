<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Welcome {{$customer->name}}</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aut et expedita facilis inventore laborum quae qui ratione sapiente voluptates?</p>

<a href="{{route('verify',$customer->email_verified_token)}}">Click here {{$customer->email_verified_token}}</a>
</body>
</html>
