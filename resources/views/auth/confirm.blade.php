<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Активация регистрации нового ползователя</title>
</head>

<body>
    <h1>Спасибо за регистрацию, {{$user->email}}!</h1>

    <p>
        Перейдите <a href='{{ url("registration/confirm/{$user->token}") }}'>по ссылке </a>чтобы завершить регистрацию!
    </p>
</body>

</html>