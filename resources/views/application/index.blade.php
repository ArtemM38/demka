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
    <div class="w-3/6 mx-auto pt-5">
        <span class="text-2xl text-indigo-300"> Мои заявки:</span> <br>
        <div class="grid grid-cols-3 gap-4 mt-5">
            @foreach ($applications as $application)
            <div class="rounded-lg bg-white py-2 px-2 w-auto">
                Адрес: {{ $application->address }} <br>
                Номер телефона: {{ $application->phone }} <br>
                Дата: {{ $application->date }} <br>
                Метод оплаты: {{ $application->pay_method }} <br>
            </div>
            @endforeach
        </div>
        <button class="bg-[blue-200] bg-green-700 w-40 h-10  rounded-lg mt-10"><a href="{{ route('application.create') }}">Создать заявку</a></button>
    </div>
</body>

</html>
