<x-app-layout title="profil">
    <aside>
        <section>
            <h2>MENU</h2>
            @include('layouts.secondary_menu')
        </section>
    </aside>

    <main class="page_profile">
        <section class="infos">
            <div class="infos_top">
                <h1 class="infos_nom">{{$user->name}}</h1>
                <a class="infos_button_edit" href="#">Modifier</a>
            </div>
            <p><a href="#">Accueil</a> / Profil</p>
            <img style="object-fit: contain" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">

            {{-- Je l'enlève, c'est la bio qui n'existe pas --}}
            {{-- <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p> --}}
        </section>

        <section class="tableaux_suivi">
            <h2>Tableaux suivis</h2>
            <div class="tableaux_suivi_slider slider">
                @foreach ($user->abonnements as $tab)
                    <div onclick="window.location = '{{ route("tableau.show", $tab) }}'">
                        <img src="@if ($tab->url_icone)
                            {{ $tab->url_icone }}
                        @else
                            {{ asset('img/rond_vide.png') }}
                        @endif" alt="{{$tab->nom}}">
                        <p>{{$tab->nom}}</p>
                    </div>
                @endforeach
            </div>
            {{-- <p class="buttonAdd"><a href="#">Proposer un article</a></p> --}}
        </section>

        <section class="tableaux_prives">
            <h2>Tableaux privés</h2>
            <div class="tableaux_prives_slider slider ">
                @foreach ($user->tableauxCrees as $tab)
                    @if($tab->prive && $tab->id != Auth::user()->tableauSaved->id)
                        <div onclick="window.location = '{{ route("tableau.show", $tab) }}'">
                            <img src="@if ($tab->url_icone)
                            {{ $tab->url_icone }}
                        @else
                            {{ asset('img/rectangle_vide.png') }}
                        @endif" alt="{{ $tab->nom }}">
                            <p>{{$tab->nom}}</p>
                        </div>
                    @endif
                @endforeach
                @foreach ($user->tableaux as $tab)
                    <div onclick="window.location = '{{ route("tableau.show", $tab) }}'">
                        <img src="@if ($tab->url_icone)
                        {{ $tab->url_icone }}
                    @else
                        {{ asset('img/rectangle_vide.png') }}
                    @endif" alt="{{$tab->nom}}">
                        <p>{{$tab->nom}}</p>
                    </div>
                @endforeach
            </div>
            <p class="buttonAdd"><a href="{{ route('add_tableau') }}">Créer un tableau privé</a></p>
        </section>

        <section class="publications_sauvegardees">
            <h2>Publications sauvegardées</h2>
            <div class="publications_sauvegardees_slider slider slider_articles_miniatures">
                @php
                    $count = count($user->tableauSaved->posts)>6 ? 6 : count($user->tableauSaved->posts);
                @endphp
                @for ($i = 0; $i < $count; $i++)
                    @if($i%2===0)
                        <div>
                    @endif
                    
                    @php
                        $post=$user->tableauSaved->posts[$i];
                    @endphp
                    @include('layouts.article_miniature')

                    @if($i%2!==0 || $i===$count-1)
                        </div>
                    @endif
                @endfor
            </div>
            <p class="button"><a href="{{ route('saved_posts', ['tabID' => Auth::user()->tableauSaved->id]) }}">Voir toutes vos publications sauvegardées</a></p>
        </section>

        <section class="derniers_posts">
            <h2>Derniers posts</h2>
            <div class="derniers_posts_slider slider slider_articles_miniatures">
                @php
                    $count = count($user->posts)>6 ? 6 : count($user->posts);
                @endphp
                @for ($i = 0; $i < $count; $i++)
                    @if($i%2===0)
                        <div>
                    @endif

                    @php
                        $post=$user->posts[$i];
                    @endphp
                    @include('layouts.article_miniature')

                    @if($i%2!==0 || $i===$count-1)
                        </div>
                    @endif
                @endfor
            </div>
            {{-- <p class="button"><a href="#">Voir tous les derniers posts</a></p> --}}
        </section>

        <div class="sidebar sidebarProfile">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border/>
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border/>
            @endif
        </div>
    </main>
</x-app-layout>
