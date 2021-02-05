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
<body class="home">
<header>
    <nav class="container">
        <div class="left_elements">
            <img class="logo" src="{{ asset('img/Logo.png') }}" alt="Logo de notre site.">
        </div>

        <div class="right_elements">
            <div class="search-bar">
                <i class="fas fa-search" onclick="ClickSearchIcone()"></i>
                <form id="search-form">
                    <input id="search-toggle" type="search" placeholder="Rechercher">
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
<div class="container site-global">
    <aside>
        <section>
            <h2>Tableau privés</h2>
            <div class="tableaux_miniatures">
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
            </div>
            <button>Créer</button>
        </section>
        <section>
            <h2>Publications sauvegardées</h2>
            <article class="article-save">
                <img src="{{ asset('img/carre_vide.png') }}" alt="">
                <p class="article-save-headline">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p>
                <p class="article-save-infos">Par <a href="#">Nom Prénom</a> dans <a href="#">Anglais</a></p>
            </article>
        </section>
    </aside>
    <main>
        <section>
            <h2>Mes tableaux publics</h2>
        </section>
        <section>
            <article class="article-card">
                <div class="article-infos">
                    <a href="#"><img class="article-auteur-image" src="{{ asset('img/Rond.png') }}" alt=""><p class="article-auteur">Nom Prénom</p></a>
                    <p class="article-date">Il y a 1h</p>
                </div>
                <p class="article-headline">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor #incididunt ero labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco poriti laboris nisi ut aliquip ex ea commodo consequat.</p>
                <img class="article-image" src="{{ asset('img/Rectangle.png') }}" alt="">
                <div class="article-footer">
                    <div class="article-likes"><a href=""><img src="{{ asset('img/heart.png') }}" alt="">605</a></div>
                    <div class="article-favoris"><a href=""><img src="{{ asset('img/down-arrow.png') }}" alt="">Ajouter aux favoris</a></div>
                    <div class="article-Retweet"><a href=""><img src="{{ asset('img/retweet.png') }}" alt="">Retweet</a></div>
                    <div class="article-partager">
                        <a class="article-partager" href="#" onclick="tooglePartageDiv()">Partager</a>
                        <div class="article-partager-liens">
                            <a href="#">Facebook</a>
                            <a href="#">Twitter</a>
                            <a href="#">Email</a>
                        </div>
                    </div>
                </div>
            </article>
        </section>

    </main>
</div>
<footer>

</footer>
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

    function tooglePartageDiv() {
        document.querySelector(".article-partager-liens").classList.toggle("show");
    }
</script>

{{--<script src="{{ asset(mix('js/app.js'))}}"></script>--}}
</html>
