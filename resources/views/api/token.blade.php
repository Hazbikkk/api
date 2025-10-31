<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your token</title>
</head>
<body>
    <h2>Привет {{ $user['name'] }}! Вот твой токен: {{ $user['token'] }}</h2>
</body>
</html>