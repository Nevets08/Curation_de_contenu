<x-app-layout title="home">
    <aside>
        <section>
            <h2>Tableau privés</h2>
            <div class="tableaux_miniatures">
                @foreach ($tableaux as $tab)
                    @can('view', $tab){{--Si on a bien accès au tableau--}}
                        @if (Auth::user()->tableauSaved)
                            @if ($tab->prive && $tab->id != Auth::user()->tableauSaved->id)
                                <div>
                                    <a href="{{ route("tableau.show", $tab) }}">
                                        <img src="
                                            @if ($tab->url_icone)
                                                {{ $tab->url_icone }}
                                            @else
                                                {{ asset('img/tableauWithoutIcon.png') }}
                                            @endif" alt="">
                                        <p>{{$tab->nom}}</p>
                                    </a>
                                </div>
                            @endif
                        @else
                            @if ($tab->prive)
                                <div>
                                    <a href="{{ route("tableau.show", $tab) }}">
                                        <img src="
                                            @if ($tab->url_icone)
                                                {{ $tab->url_icone }}
                                            @else
                                                {{ asset('img/tableauWithoutIcon.png') }}
                                            @endif" alt="">
                                        <p>{{$tab->nom}}</p>
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
                @foreach ($tableaux as $tab)
                    @can('view', $tab){{--Si on a bien accès au tableau--}}
                    @if (!$tab->prive)
                        <div onclick="window.location = '{{ route("tableau.show", $tab) }}'">
                            <img src="
                            @if ($tab->url_icone)
                                {{ $tab->url_icone }}
                            @else
                                {{ asset('img/tableauWithoutIcon.png') }}
                            @endif" alt="">
                            <p>{{$tab->nom}}</p>
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
