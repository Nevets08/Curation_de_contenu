<x-app-layout title="Tableau favoris">

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
            <span>/ Vos publications sauvegardées</span>
        </div>

        <div class="posts">
            <div class="posts-infos">
                <h2>Dernières publications sauvegardées</h2>

                <div class="actions">
                    <span>Trier par : Nouveautés</span>
                </div>
            </div>

            @include('components.others.declare_format_interval')

            @foreach ($tableau->posts as $post)
                @include('post.show')
            @endforeach
        </div>
    </main>

</x-app-layout>
