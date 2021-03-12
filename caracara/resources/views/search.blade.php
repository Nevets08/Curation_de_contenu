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
                <a href=""><i class="fas fa-search"></i></a>
            </div>

            <div class="breadcrumb">
                <a href="{{ route('home') }}">Accueil</a>
                <span>/ Recherche</span>
            </div>

            @if (isset($tableaux))

                <div class="result-container">
                    <h2>{{ count($tableaux) }}

                    @if (count($tableaux) >= 2) résultats @else résultat
                        @endif

                        pour la recherche dans <strong>les tableaux</strong> : "{{ $search_text }}"
                    </h2>

                    @if (count($tableaux) > 0)

                        @foreach ($tableaux as $tableau)

                            <div class="posts">
                                <a href="">
                                    <div class="post">
                                        <div class="left-post">
                                            <img src="{{ $tableau->url_icone }}" alt="">
                                        </div>
                                        <div class="right-post">
                                            <div class="title">
                                                <h1>{{ $tableau->nom }}</h1>
                                                <i class="fas fa-info-circle"></i>
                                            </div>
                                            <p>{{ $tableau->description }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        @endforeach

                    @else
                        <p>Pas de résultats trouvés</p>
                    @endif

                    <div class="pagination-search">
                        {{ $tableaux->appends(request()->input())->links('layouts.paginationlinks') }}
                    </div>

                    <div class="new-search">
                        <h3>Effectuer une nouvelle recherche</h3>
                        <a href="{{ route('search') }}">
                            <i class="far fa-arrow-alt-circle-up"></i>
                        </a>
                    </div>
            @endif
        </main>

</x-app-layout>
