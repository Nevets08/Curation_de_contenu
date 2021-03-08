<x-app-layout title="tableau">

    <aside>
        <section>
            <h2>MENU</h2>
            @include('layouts.secondary_menu')
        </section>
    </aside>

    <main>
        <div class="title">
            <h1>Vos tableaux privés</h1>
        </div>

        <div class="breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <span>/ Vos tableaux privés</span>
        </div>

        <div class="tableaux">
            <div>
                <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                <h2>Lorem ispum dolor sit amet</h2>
                <p>Créer par <a href="#">Nom Prénom</a></p>
            </div>
            <div>
                <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                <h2>Lorem ispum dolor sit amet</h2>
                <p>Créer par <a href="#">Nom Prénom</a></p>
            </div>
            <div>
                <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                <h2>Lorem ispum dolor sit amet</h2>
                <p>Créer par <a href="#">Nom Prénom</a></p>
            </div>
            <div>
                <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                <h2>Lorem ispum dolor sit amet</h2>
                <p>Créer par <a href="#">Nom Prénom</a></p>
            </div>
            <div>
                <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                <h2>Lorem ispum dolor sit amet</h2>
                <p>Créer par <a href="#">Nom Prénom</a></p>
            </div>
            <div>
                <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                <h2>Lorem ispum dolor sit amet</h2>
                <p>Créer par <a href="#">Nom Prénom</a></p>
            </div>
        </div>
    </main>

</x-app-layout>
