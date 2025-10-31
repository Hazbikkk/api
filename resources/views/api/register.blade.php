<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form method="POST" action="{{ route('api.register.store') }}">
        @csrf
        Имя: <input type="text" name="name"><br>
        Почта: <input type="text" name="email"><br>
        Пороль: <input type="text" name="password"><br>

        <button type="submit">Зарегаться</button>
    </form>
</body>
</html>