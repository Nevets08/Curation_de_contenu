<x-app-layout title="Tableau public">

    <aside>
        <section>
            <h2>MENU</h2>
            @include('layouts.secondary_menu')
        </section>
    </aside>

    <main>
        <div class="title">
            <h1>Vos tableaux publics</h1>
        </div>

        <div class="breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <span>/ Vos tableaux publics</span>
        </div>

        @include('tableau.show_miniature')
    </main>

</x-app-layout>
