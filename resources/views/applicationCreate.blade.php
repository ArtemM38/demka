<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    @foreach ($applications as $application)
    <h3> Создание заявки:</h3> <br>
    <form method="POST" action="{{ route('applicationCreate') }}">
    @csrf
    Заполните данные <br>
    Адрес: <input type="text" name="address"> <br>
    Номер телефона: <input type="phone" name="phone"> <br>
    Дата и время получения услуги: <input type="datetime" name="date"> <br>
    Серия и номер вод. удоств.: <input type="number" name="license_series"> <br>
    Дата получения ВУ: <input type="date" name="license_date"> <br>
    Выберите марку авто:  <select name="car_mark" placeholder="$application->CarMark->car_mark"></select> <br>
    @endforeach()
    </form>
</body>
</html>