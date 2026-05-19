<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>Привет!</h1>
    @foreach ($applications as $application)
    <h3> Мои заявки:</h3> <br>
    Адрес: {{ $application->address }} <br>
    Номер телефона: {{ $application->phone }} <br>
    Дата: {{ $application->date }} <br>
    Метод оплаты: {{ $application->pay_method }} <br>

    @endforeach
</body>
</html>