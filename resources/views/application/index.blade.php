<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <h3> Мои заявки:</h3> <br>
    @foreach ($applications as $application)
    Адрес: {{ $application->address }} <br>
    Номер телефона: {{ $application->phone }} <br>
    Дата: {{ $application->date }} <br>
    Метод оплаты: {{ $application->pay_method }} <br> <br> <br>

    @endforeach
    <button class="bg-[blue-200] text-green-700"><a href="{{ route('application.create') }}">Создать заявку</a></button>

    @if (auth()->user()->isAdmin())
    <a href="{{ route('admin.index') }}">Админ-панель</a>
    @endif

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                                                this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
</body>

</html>