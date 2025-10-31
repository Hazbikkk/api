<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Главная страничка</h1><br>
    <a href="{{ route('api.students.index') }}">Ученики</a>
    <a href="{{ route('api.register') }}">Зарегистрироваться</a>
    <a href="{{ route('api.login') }}">Залогиниться</a>
</body>
</html>