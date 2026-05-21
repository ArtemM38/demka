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
        Статус заявки: <br> <select name="status" class="rounded-xl bg-indigo-200 w-40">
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
