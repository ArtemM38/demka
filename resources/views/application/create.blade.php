<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<header class="bg-indigo-200 h-16">
    <div class="flex py-4 text-xl w-3/5 mx-auto">
        <span class="text-gray-900">Авто2026</span>

        <a href="{{ route('application.index') }}" class="text-gray-900 ml-10">Мои заявки</a>

        <span class="flex ml-auto">
            @if (auth()->user()->isAdmin())
            <a href="{{ route('admin.index') }}" class="mr-5 text-green-700">Админ-панель</a>
            @endif

            @if (auth()->user()->isUser())
            <a href="{{ route('application.create') }}" class="mr-5 text-green-700">Создать заявку</a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')" class="text-red-500"
                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Выйти из аккаунта') }}
                </x-dropdown-link>
            </form>
        </span>
    </div>
</header>

<body class="bg-indigo-100">
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
            <option value="cash">Наличные</option>
            <option value="card">Картой</option>
        </select><br>
        <input type="checkbox">Я ознакомлен с правилами <br>
        <button type="submit">Отправить</button>
    </form>

    <button><a href="{{ route('application.index')}}"> Мои заявки</a></button>
</body>
</html>
