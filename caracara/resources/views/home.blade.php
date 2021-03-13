<x-app-layout title="home">
    <aside>
        <section>
            <h2>Tableau privés</h2>
            <div class="tableaux_miniatures">
                @foreach ($tableaux as $tableau)
                    @can('view', $tableau){{--Si on a bien accès au tableau--}}
                        @if (Auth::user()->tableauSaved)
                            @if ($tableau->prive && $tableau->id != Auth::user()->tableauSaved->id)
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
                        @else
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
                        @endif

                    @endcan
                @endforeach
            </div>
            <button><a href="{{ route("tableau.create") }}">Créer</a></button>
        </section>
        @if(isset(Auth::user()->tableauSaved))
            <section>
                <h2>Publications sauvegardées</h2>
                @php
                    $count = count(Auth::user()->tableauSaved->posts)>3 ? 3 : count(Auth::user()->tableauSaved->posts);
                @endphp
                @for ($i = 0; $i < $count; $i++)
                    @php
                        $post=Auth::user()->tableauSaved->posts[$i];
                    @endphp
                    @include('post.show_maniature')
                @endfor
                <p class="button"><a href="{{ route('saved_posts', ['tabID' => Auth::user()->tableauSaved->id]) }}">Voir toutes vos publications sauvegardées</a></p>
            </section>
        @endif

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
            @include('components.others.declare_format_interval')
            @foreach ($posts as $post)
                @can('abonnement', $post)
                    @include('post.show')
                @endcan
            @endforeach

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
