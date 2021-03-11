<x-app-layout title="tableau favoris">

    <aside>
        <section>
            <h2>MENU</h2>
            @include('layouts.secondary_menu')
        </section>
    </aside>

    <main>
        <div class="title">
            <h1>Vos publications sauvegardées</h1>
            <i class="far fa-save"></i>
        </div>

        <div class="breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <span>/ Vos tableaux privés</span>
        </div>

        <div class="posts">
            <div class="posts-infos">
                <h2>Dernières publications sauvegardées</h2>

                <div class="actions">
                    <span>Trier par : Nouveautés</span>
                </div>
            </div>

            @include('layouts.declare_format_interval')

            @foreach ($tableau->posts as $post)
                @include('layouts.display_one_post')
            @endforeach
        </div>
    </main>

</x-app-layout>
