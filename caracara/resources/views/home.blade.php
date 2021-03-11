<x-app-layout title="home">
    <aside>
        <section>
            <h2>Tableau privés</h2>
            <div class="tableaux_miniatures">
                @foreach ($tableaux as $tableau)
                    @can('view', $tableau){{--Si on a bien accès au tableau--}}
                        @if ($tableau->prive)
                            <div>
                                <a href="{{ route("tableau.show", $tableau) }}">
                                    <img src="
                                        @if ($tableau->url_icone)
                                            {{ $tableau->url_icone }}
                                        @else
                                            {{ asset('img/rectangle_vide.png') }}
                                        @endif" alt="">
                                    <p>{{$tableau->nom}}</p>
                                </a>
                            </div>
                        @endif
                    @endcan
                @endforeach
            </div>
            <button><a href="{{ route("add_tableau") }}">Créer</a></button>
        </section>
        <section>
            <h2>Publications sauvegardées</h2>
            <article class="article-miniature">
                <img src="{{ asset('img/carre_vide.png') }}" alt="">
                <p class="article-miniature-headline">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p>
                <p class="article-miniature-infos">Par <a href="#">Nom Prénom</a> dans <a href="#">Anglais</a></p>
            </article>
        </section>
    </aside>
    <main>
        <section>
            <h2>Mes tableaux publics</h2>
            <div class="tableaux_publics">
                @foreach ($tableaux as $tableau)
                    @can('view', $tableau){{--Si on a bien accès au tableau--}}
                    @if (!$tableau->prive)
                        <div onclick="window.location = '{{ route("tableau.show", $tableau) }}'">
                            <img src="
                            @if ($tableau->url_icone)
                                {{ $tableau->url_icone }}
                            @else
                                {{ asset('img/rond_vide.png') }}
                            @endif" alt="">
                            <p>{{$tableau->nom}}</p>
                        </div>
                    @endif
                    @endcan
                @endforeach
            </div>
        </section>
        <section>
            @include('layouts.declare_format_interval');
            @foreach ($posts as $post)
                @can('abonnement', $post)
                    @include('layouts.display_one_post');
                @endcan
            @endforeach
            @include('layouts/modal_retweet');
        </section>

    </main>

<footer>

</footer>

<script>
    function tooglePartageDiv() {
        document.querySelector(".article-partager-liens").classList.toggle("show");
    }
</script>

</x-app-layout>
