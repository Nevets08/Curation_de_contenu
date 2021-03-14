<x-app-layout title="Recherche">
    <aside>
        <section>
            <h2>MENU</h2>
            @include('layouts.secondary_menu')
        </section>
    </aside>

    <main>
        <div class="title">
            <h1>Recherche</h1>
            <i class="fas fa-search"></i>
        </div>

        <div class="breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <span>/ Recherche</span>
        </div>

        @if (isset($tableaux))

            <div class="result-container">
                <h2>{{ count($tableaux) }}
                    @if (count($tableaux) >= 2) résultats @else résultat @endif pour :
                    "{{ $search_text }}"
                </h2>

                @if (count($tableaux) > 0)
                    @foreach ($tableaux as $tableau)

                        <div class="tableaux">
                            <div>
                                <a href="{{ route('tableau.show', $tableau) }}">
                                    <img src="
                                        @if ($tableau->url_icone) {{ $tableau->url_icone }}
                                    @else{{ asset('img/rectangle_vide.png') }} @endif
                                    " alt="">

                                    <h2>{{ $tableau->nom }}</h2>
                                    <p>{{ $tableau->description }}</p>
                                    <p>Créé par <a href="#">{{ $tableau->user->name }}</a></p>
                                </a>
                            </div>
                        </div>

                    @endforeach
                @else
                    <p>Pas de résultats trouvés</p>
                @endif

                <div class="pagination-search">
                    {{ $tableaux->appends(request()->input())->links('search.paginationlinks') }}
                </div>

                {{-- <div class="new-search"> --}}
                {{-- <h3>Effectuer une nouvelle recherche</h3> --}}
                {{-- <a href="{{ route('search') }}"> --}}
                {{-- <i class="far fa-arrow-alt-circle-up"></i> --}}
                {{-- </a> --}}
                {{-- </div> --}}
        @endif
    </main>

</x-app-layout>
