<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="{{ route('api.login.store') }}">
        @csrf
        Имя: <input type="text" name="name"><br>
        Почта: <input type="text" name="email"><br>
        Пороль: <input type="text" name="password"><br>

        <button type="submit">Войти</button>
    </form>
</body>
</html>