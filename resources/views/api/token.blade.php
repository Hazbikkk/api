<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your token</title>

<style>
    body { font-family: sans-serif; padding: 20px; }
    form { max-width: 300px; }
    input, button {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    button {
      background: #007bff;
      color: white;
      border: none;
      cursor: pointer;
    }
    button:hover { background: #0056b3; }
    .alert {
      display: none;
      margin-top: 10px;
      padding: 10px;
      background: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }
  </style>

</head>
<body>
    <h2>Привет {{ $user['name'] }}! Вот твой токен: {{ $user['token'] }}</h2><br>


    <form method="PUT" action="{{ route('api.token.update') }}">
        @csrf
        @method('PUT')
        Нажмите ниже чтобы обновить токен<br>
        <button type="submit">Обновить</button>
    </form>
    

    <h3>Выйти из аккаунта: </h3>
    <form method="DELETE" action="{{ route('api.tokenIsDelete') }}">
        @csrf
    <button type="submit">выйти</button>
    </form><br>

</body>
</html>