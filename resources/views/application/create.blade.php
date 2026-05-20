<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <h3> Создание заявки:</h3> <br>
    <form method="POST" action="{{ route('application.create') }}">
        @csrf
        Заполните данные <br>
        Адрес: <input type="text" name="address"> <br>
        Номер телефона: <input placeholder="89149555555" maxlength="11" type="number" name="phone"> <br>
        Дата и время получения услуги: <input type="datetime-local" name="date"> <br>
        Серия и номер вод. удоств.: <input type="number" name="license_series"> <br>
        Дата получения ВУ: <input type="date" name="license_date"> <br>
        Выберите марку авто:
        <select name="car_marks_id">
            @foreach ($carmarks as $carmark)
            <option value="{{ $carmark->id }}"> {{ $carmark->car_mark}} </option>
            @endforeach
        </select><br>
        Выберите модель авто:
        <select name="car_models_id">
            @foreach ($carmodels as $carmodel)
            <option value="{{ $carmodel->id }}"> {{ $carmodel->car_model}} </option>
            @endforeach
        </select><br>
        <select name="pay_method">
            <option value="cash">cash</option>
            <option value="card">card</option>
        </select><br> 
        <input type="checkbox">Я ознакомлен с правилами <br>
        <button type="submit">Отправить</button>
    </form>

    <button><a href="{{ route('application.index')}}"> Мои заявки</a></button>
</body>

</html>