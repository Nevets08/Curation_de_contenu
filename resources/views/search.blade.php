<<<<<<< Updated upstream
=======
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Caracara - Vos publications sauvegardées</title>
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}" />
</head>

<body>
    <div class="menu-right-fixed">
        <i class="fas fa-plus"></i>
        <i class="fas fa-envelope-open-text"></i>
        <i class="far fa-moon"></i>
    </div>

    <div class="main-container">
        <aside>
            <nav>
                <h3>menu</h3>
                <div class="border"></div>
                <ul>
                    <li><a href="{{ route('home') }}">Retourner à l'accueil <i class="fas fa-home"></i></a></li>
                    <li><a href="{{ route('private_posts') }}">Tableaux privés</a></li>
                    <li><a href="">Tableaux publics</a></li>
                    <li><a href="{{ route('saved_posts') }}">Vos publications sauvegardées</a></li>
                </ul>
            </nav>
            <div class="members">
            </div>
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

            <div class="form-search" id="form-search">
                <form action="{{ route('search') }}" method="GET" role="search">
                    @csrf
                    <div class="inputs">
                        <label for="">Que cherchez-vous ?</label><br>
                        <input type="text" name="search_general" placeholder="Javascript..." required>
                    </div>

                    {{-- <div class="inputs">
                        <label for="">Dans quel tableau ?</label><br>
                        <select name="" id="">
                            <option value="">Tous</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                        </select>
                    </div>

                    <div class="inputs">
                        <label for="">Publié par :</label><br>
                        <select name="" id="">
                            <option value="">Tous</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                        </select>
                    </div> --}}

                    <button type="submit">Rechercher</button>
                </form>
            </div>

            @if (isset($tableaux))

                <div class="result-container">
                    <h2>Résultat pour la recherche : "{{ $search_text }}"</h2>

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

                    <div class="new-search">
                        <h3>Effectuer une nouvelle recherche</h3>
                        <a href="{{{ route('search') }}}">
                            <i class="far fa-arrow-alt-circle-up"></i>
                        </a>
                    </div>
            @endif
        </main>
</body>

</html>
>>>>>>> Stashed changes
