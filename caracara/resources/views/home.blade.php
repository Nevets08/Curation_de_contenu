<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset(mix('css/app.css'))}}">

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>
<body class="">
<header>
    <nav class="container">
        <div class="left_elements">
            <img class="logo" src="{{ asset('img/Logo.png') }}" alt="Logo de notre site.">
        </div>

        <div class="right_elements">
            <div class="search-bar">
                <i class="fas fa-search" onclick="ClickSearchIcone()"></i>
                <form id="search-form">
                    <input id="search-toggle" type="search" placeholder="search">
                </form>
            </div>

            <div class="user">
                <button id="userButton" onclick="ClickUserButton()">
                    <i class="fas fa-user-circle"></i><span class="hidden md">Nom Prénom</span>
                </button>
                <div id="userMenu">
                    <ul>
                        <li><a href="#">My account</a></li>
                        <li><a href="#">Notifications</a></li>
                        <li>
                            <hr>
                        </li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>


    </nav>
</header>
{{--        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">--}}
{{--            @if (Route::has('login'))--}}
{{--                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">--}}
{{--                    @auth--}}
{{--                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
</body>

<script>
    function ClickUserButton() {
        if (window.matchMedia("(min-width: 768)").matches) {
            document.querySelector("#userMenu").classList.toggle("showUserMenu");
        } else {
            window.location.href = "{{ route('login') }}";
        }
    }

    function ClickSearchIcone() {
        document.querySelector("#search-form").classList.toggle("showSearchBar");
    }
</script>

{{--<script src="{{ asset(mix('js/app.js'))}}"></script>--}}
</html>
