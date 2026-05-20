<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @foreach ($applications as $application)
    ФИО пользователя: {{ $application->user->full_name}} <br>
    Адрес: {{ $application->address }} <br>
    Номер телефона: {{ $application->phone }} <br>
    Дата и время получения услуги: {{ $application->date }} <br>
    Серия и номер вод. удоств.: {{ $application->license_series }} <br>
    Дата получения ВУ: {{ $application->license_date }} <br>
    Марка авто: {{ $application->CarMark->car_mark }} <br>
    Модель авто: {{ $application->CarModel->car_model }} <br>
    Метод оплаты: {{ $application->pay_method }} <br> 

    <form method="POST" action="{{ route('admin.update', ['id'=>$application->id]) }}">
    @csrf 
    @method('PATCH')
    Статус заявки: <select name="status">
        <option value="new" @selected($application->status == 'new')>новая</option>
        <option value="cancel" @selected($application->status == 'cancel')>отменена</option>
        <option value="completed" @selected($application->status == 'completed')>выполнена</option>
    </select>
    <button type="submit">Сохранить</button>
</form>
    <br> <br> <br>
    @endforeach
</body>

</html>