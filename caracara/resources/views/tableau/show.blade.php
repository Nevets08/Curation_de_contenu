<x-app-layout title="tableau">

    <aside>
        <section>
            <h2>MENU</h2>
            @include('layouts.secondary_menu')
        </section>

        @if ($tableau->prive)
            <section class="members">
                <h2>Membres du tableau</h2>
                @include('layouts.members_posts')
            </section>
        @endif
    </aside>

    <main>
        <div class="title">
            <h1>{{ $tableau->nom }}</h1>
            <i class="fas fa-sliders-h"></i>
        </div>

        <div class="breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <span>/ Vos tableaux privés</span>
        </div>

        <div class="posts">
            <div class="posts-infos">
                <h2>Dernières publications</h2>

                <div class="actions">
                    <span>Trier par : Nouveautés</span>

                    <div>
                        <a class="btnAction" href="{{ route('add_post') }}"><i class="fas fa-plus-circle"></i>Ajouter
                            une publication</a>

                        @php
                            $userDejaAbo = false;
                            foreach ($tableau->abonnes as $item){
                                if (isset($item->id) && $item->id === $user->id)
                                    $userDejaAbo = true;
                            }
                        @endphp

                        @if (!$userDejaAbo)
                            <form action="{{ route('tableau.update', $tableau) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="abonne" value="{{$user->id}}">
                                <input type="hidden" name="sabonner" value="1">

                                <button class="btnAction" type="submit"><i class="fas fa-bell"></i>S'abonner</button>
                            </form>
                        @else
                            <form action="{{ route('tableau.update', $tableau) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="abonne" value="{{$user->id}}">
                                <input type="hidden" name="sabonner" value="0">

                                <button class="btnAction" type="submit"><i class="fas fa-bell-slash"></i>Se désabonner
                                </button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
            @include('layouts.declare_format_interval')

            @foreach ($tableau->posts as $post)
                @include('layouts.display_one_post')
                @include('layouts/modal_retweet')
            @endforeach



        </div>
    </main>

    <div class="sidebar sidebarTableau">
        <div>
            <h2>Paramètres du tableau</h2>
        </div>
        <img src="{{$tableau->url_icone}}" alt="">
        <h2>Tableau {{ $tableau->name }}</h2>
        <ul>
            <li>
                <a href="#">
                    <i class="fas fa-plus"></i>
                    <p>Ajouter une publication</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-users"></i>
                    <p>Gérer les membres</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-chart-pie"></i>
                    <p>Voir les statistiques</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fas fa-book"></i>
                    <p>Générer une bibliographie</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="far fa-comment-alt"></i>
                    <p>Proposer un lien à ajouter</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-search"></i>
                    <p>Rechercher dans le tableau</p>
                </a>
            </li>
            @if($tableau->prive and Auth::user()->id != $tableau->user->id)
            <li>
                <a href="#">
                    <i class="far fa-times-circle"></i>
                    <form action="{{ route('tableau.update', $tableau) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="userToUpdate" value="{{$user->id}}">
                        <input type="hidden" name="quit" value="1">

                        <button type="submit">Quitter le tableau</button>
                    </form>
                </a>
            </li>
            @endif
        </ul>
    </div>


</x-app-layout>


{{--<body>--}}
{{--    @can ('view', $tableau) --}}{{--Si on a bien accès au tableau--}}

{{--        <h1>{{ $tableau->nom }}</h1>--}}
{{--        <p>--}}
{{--            Icone du tableau :--}}
{{--            <img style="max-height: 50px; max-width: 50px;" src="{{$tableau->url_icone}}">--}}
{{--        </p>--}}
{{--        <p>{{ $tableau->description }}</p>--}}
{{--        <p>Tableau créé par {{ $tableau->user->name }}</p>--}}
{{--        <p>Ce tableau est @if ($tableau->prive)--}}
{{--            privé--}}
{{--        @else--}}
{{--            public--}}
{{--        @endif</p>--}}

{{--        --}}{{-- s'abonner --}}
{{--        @php--}}
{{--            $userDejaAbo = false;--}}
{{--            foreach ($tableau->abonnes as $item){--}}
{{--                if (isset($item->id) && $item->id === $user->id)--}}
{{--                    $userDejaAbo = true;--}}
{{--            }--}}
{{--        @endphp--}}
{{--        @if (!$userDejaAbo)--}}
{{--            <form action="{{ route('tableau.update', $tableau) }}" method="post">--}}
{{--                @csrf--}}
{{--                @method('PUT')--}}
{{--                <input type="hidden" name="abonne" value="{{$user->id}}">--}}
{{--                <input type="hidden" name="sabonner" value="1">--}}

{{--                <button type="submit">S'abonner :)</button>--}}
{{--            </form>--}}
{{--        @else--}}
{{--            <form action="{{ route('tableau.update', $tableau) }}" method="post">--}}
{{--                @csrf--}}
{{--                @method('PUT')--}}
{{--                <input type="hidden" name="abonne" value="{{$user->id}}">--}}
{{--                <input type="hidden" name="sabonner" value="0">--}}

{{--                <button type="submit">Se désabonner :(</button>--}}
{{--            </form>--}}
{{--        @endif--}}


{{--        <p>{{count($tableau->abonnes)}} abonnés :</p>--}}
{{--        <ul>--}}
{{--            @foreach ($tableau->abonnes as $abonne)--}}
{{--                <li>{{$abonne->name}}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--        <p>Posts du tableau :</p>--}}
{{--        <ul>--}}
{{--        @foreach ($tableau->posts as $post)--}}
{{--            <li><a href="{{ $post->url }}" target="_blank">{titre du lien}</a> (posté par {{ $post->user->name }})</li>--}}
{{--        @endforeach--}}
{{--        </ul>--}}

{{--        <h2>Paramètres du tableau</h2>--}}
{{--            @can('addPost', $tableau)--}}
{{--            <h3>Ajouter un post</h3>--}}
{{--                <form action="{{ route('post.store') }}" method="post" style="display: flex; flex-direction: column">--}}
{{--                    @csrf--}}

{{--                    <label>--}}
{{--                        A quel(s) tableau(x) souhaitez-vous l'ajouter ? (vous pouvez selectionner plusieurs tableaux avec ctrl)--}}
{{--                        <select multiple required name="tableau[]">--}}
{{--                            @foreach ($allTableaux as $tab)--}}
{{--                                @can('addPost', $tab)--}}
{{--                                    <option--}}
{{--                                        value={{ $tab->id }}--}}
{{--                                        @if ( $tab->id === $tableau->id )--}}
{{--                                            selected--}}
{{--                                        @endif--}}
{{--                                    >--}}
{{--                                        {{ $tab->nom }}--}}
{{--                                    </option>--}}
{{--                                @endcan--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </label>--}}

{{--                    <label>--}}
{{--                        Renseignez l'url de l'article--}}
{{--                        <input type="url" placeholder="URL de l'article"  name="url" required >--}}
{{--                    </label>--}}

{{--                    <div style="display: none">--}}
{{--                        <input name="user_id" value="@if($user) {{$user->id}} @else anonyme @endif">--}}
{{--                        <input name="created_from" value="{{$tableau->id}}">--}}
{{--                    </div>--}}

{{--                    <button type="submit">Envoyer !</button>--}}
{{--                </form>--}}
{{--            @endcan--}}

{{--            @if($user == $tableau->user)--}}
{{--                @if($tableau->prive)--}}
{{--                    <h3>Gérer les membres</h3>--}}
{{--                        <h4>Liste des membres</h4>--}}
{{--                            <ul>--}}
{{--                                @foreach ($tableau->users as $user)--}}
{{--                                    <li>--}}
{{--                                        {{ $user->name }}--}}
{{--                                        @if ($user->pivot->contributeur)--}}
{{--                                            (contributeur)--}}
{{--                                            <form action="{{ route('tableau.update', $tableau) }}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                @method('PUT')--}}
{{--                                                <input type="hidden" name="userToUpdate" value="{{$user->id}}">--}}
{{--                                                <input type="hidden" name="contributeur" value="0">--}}

{{--                                                <button type="submit">Nommer lecteur</button>--}}
{{--                                            </form>--}}
{{--                                        @else--}}
{{--                                            (lecteur)--}}
{{--                                            <form action="{{ route('tableau.update', $tableau) }}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                @method('PUT')--}}
{{--                                                <input type="hidden" name="userToUpdate" value="{{$user->id}}">--}}
{{--                                                <input type="hidden" name="contributeur" value="1">--}}

{{--                                                <button type="submit">Nommer contributeur</button>--}}
{{--                                            </form>--}}
{{--                                        @endif--}}
{{--                                        <form action="{{ route('tableau.update', $tableau) }}" method="post">--}}
{{--                                            @csrf--}}
{{--                                            @method('PUT')--}}
{{--                                            <input type="hidden" name="userToUpdate" value="{{$user->id}}">--}}
{{--                                            <input type="hidden" name="quit" value="1">--}}

{{--                                            <button type="submit">Ca dégage</button>--}}
{{--                                        </form>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}

{{--                        <h4>Ajouter des membres</h4>--}}
{{--                            <form action="{{ route('tableau.update', $tableau) }}" method="post">--}}
{{--                                @csrf--}}
{{--                                @method('PUT')--}}

{{--                                <label>--}}
{{--                                    Qui voulez vous inviter ? (vous pouvez selectionner plusieurs personnes avec ctrl)--}}
{{--                                    <select multiple name="user[]" required>--}}
{{--                                        @foreach ($allUsers as $optionUser)--}}
{{--                                            <option--}}
{{--                                                value={{ $optionUser->id }}--}}
{{--                                                @if (   $optionUser == $tableau->user //Le créateur du tableau--}}
{{--                                                        || array_search($optionUser->toArray()['id'], array_column($tableau->users->toArray(), 'id')) !== false //Les gens déjà dans le tableau--}}
{{--                                                    )--}}
{{--                                                    disabled--}}
{{--                                                    style="display: none"--}}
{{--                                                @endif--}}
{{--                                            >--}}
{{--                                                {{ $optionUser->name }}--}}
{{--                                            </option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </label>--}}

{{--                                <button type="submit">Valider</button>--}}
{{--                            </form>--}}
{{--                @endif--}}

{{--                <h3>Modifier le tableau</h3>--}}
{{--                <form action="{{ route('tableau.update', $tableau) }}" method="post" enctype="multipart/form-data">--}}
{{--                    @csrf--}}
{{--                    @method('PUT')--}}
{{--                    <label>--}}
{{--                        Nom du  tableau :--}}
{{--                        <input type="text" placeholder="Nom du tableau"  name="nom" required value="{{$tableau->nom}}">--}}
{{--                    </label>--}}

{{--                    <label>--}}
{{--                        Description :--}}
{{--                        <textarea name="description" cols="30" rows="10" placeholder="Description du tableau...">{{$tableau->description}}</textarea>--}}
{{--                    </label>--}}

{{--                    <label>--}}
{{--                        Nouvelle icône :--}}
{{--                        <input type="file" name="icone" accept="image/png, image/jpeg">--}}
{{--                    </label>--}}

{{--                    <button type="submit">Modifier</button>--}}
{{--                </form>--}}

{{--                <h3>Supprimer le tableau</h3>--}}
{{--                <form action="{{ route('tableau.destroy', $tableau) }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button type="submit">X</button>--}}
{{--                </form>--}}
{{--            @else--}}
{{--                @if($tableau->prive)--}}
{{--                    <form action="{{ route('tableau.update', $tableau) }}" method="post">--}}
{{--                        @csrf--}}
{{--                        @method('PUT')--}}
{{--                        <input type="hidden" name="userToUpdate" value="{{$user->id}}">--}}
{{--                        <input type="hidden" name="quit" value="1">--}}

{{--                        <button type="submit">Quitter le tableau</button>--}}
{{--                    </form>--}}
{{--                @endif--}}
{{--            @endif--}}

{{--    @else--}}
{{--        <p>Vous n'avez pas accès à ce tableau !</p>--}}
{{--    @endcan--}}
{{--</body>--}}

