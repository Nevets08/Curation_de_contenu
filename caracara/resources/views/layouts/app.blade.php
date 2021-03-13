<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }} ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $attributes->get('title') }} - {{ config('app.name', 'Caracara') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">

    <!-- Scripts -->
    <script src="{{ asset(mix('js/app.js')) }}" defer></script>
    <script src="{{ asset(mix('js/initSlider.js')) }}" defer></script>
</head>

<body class="{{ $attributes->get('title') }} lightTheme">
    <header>
        <nav class="container">
            <div class="left_elements">
                <a href="{{ route('home') }}"><img class="logo" src="{{ asset('img/Logo.png') }}"
                        alt="Logo de notre site."></a>
            </div>

            <div class="right_elements">
                <div class="search-bar">
                    <i class="fas fa-search"></i>

                    <form action="{{ route('search') }}" method="GET" role="search" id="search-form">
                        @csrf
                        <input type="text" id="search-toggle" name="search_general" placeholder="Rechercher" required>
                    </form>
                </div>
            </div>

            <div class="user">
                <button id="userButton">
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"><span
                        class="hidden md">{{ Auth::user()->name }}</span>
                </button>

                <div id="userMenu">
                    <ul>
                        <li><a href="{{ route('profile.show') }}">Mon compte</a></li>
                        <li>
                            <hr>
                        </li>
                        <li><a href="{{ route('post.create') }}">Ajouter un article</a></li>
                        <li><a href="{{ route('tableau.create') }}">Créer un tableau</a></li>
                        <li>
                            <hr>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit">Déconnexion</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </nav>
    </header>

    <div class="container site-global">
        <!-- Page Content -->
        {{ $slot }}
    </div>
    <div class="menu-right-fixed">
        <a href="{{ route('post.create') }}"><i title="Ajouter un post" class="fas fa-plus"></i></a>
        <i title="Passer en mode nuit" class="far fa-lightbulb"></i>
    </div>
    @livewireScripts
</body>

</html>
