<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $tableau->nom }}</title>
</head>
<body>
    @can ('view', $tableau) {{--Si on a bien accès au tableau--}}

        <h1>{{ $tableau->nom }}</h1>
        <p>{{ $tableau->description }}</p>
        <p>Tableau créé par {{ $tableau->user->name }}</p>
        <p>Ce tableau est @if ($tableau->prive)
            privé
        @else
            public
        @endif</p>
        <p>Posts du tableau :</p>
        <ul>
        @foreach ($tableau->posts as $post)
            <li><a href="{{ $post->url }}" target="_blank">{titre du lien}</a> (posté par {{ $post->user->name }})</li>
        @endforeach
        </ul>

        <h2>Paramètres du tableau</h2>
            @can('addPost', $tableau)
            <h3>Ajouter un post</h3>
                <form action="{{ route('post.store') }}" method="post" style="display: flex; flex-direction: column">
                    @csrf

                    <label>
                        A quel(s) tableau(x) souhaitez-vous l'ajouter ? (vous pouvez selectionner plusieurs tableaux avec ctrl)
                        <select multiple required name="tableau[]">
                            @foreach ($allTableaux as $tab)
                                @can('addPost', $tab)
                                    <option
                                        value={{ $tab->id }}
                                        @if ( $tab->id === $tableau->id )
                                            selected
                                        @endif
                                    >
                                        {{ $tab->nom }}
                                    </option>
                                @endcan
                            @endforeach
                        </select>
                    </label>

                    <label>
                        Renseignez l'url de l'article
                        <input type="url" placeholder="URL de l'article"  name="url" required >
                    </label>

                    <div style="display: none">
                        <input name="user_id" value="@if($user) {{$user->id}} @else anonyme @endif">
                        <input name="created_from" value="{{$tableau->id}}">
                    </div>

                    <button type="submit">Envoyer !</button>
                </form>
            @endcan

            @if($user == $tableau->user)
                @if($tableau->prive)
                    <h3>Gérer les membres</h3>
                        <h4>Liste des membres</h4>
                            <ul>
                                @foreach ($tableau->users as $user)
                                    <li>
                                        {{ $user->name }}
                                        @if ($user->pivot->contributeur)
                                            (contributeur)
                                            <form action="{{ route('tableau.update', $tableau) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="userToUpdate" value="{{$user->id}}">
                                                <input type="hidden" name="contributeur" value="0">
                        
                                                <button type="submit">Nommer lecteur</button>
                                            </form>
                                        @else
                                            (lecteur)
                                            <form action="{{ route('tableau.update', $tableau) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="userToUpdate" value="{{$user->id}}">
                                                <input type="hidden" name="contributeur" value="1">
                        
                                                <button type="submit">Nommer contributeur</button>
                                            </form>
                                        @endif
                                        <form action="{{ route('tableau.update', $tableau) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="userToUpdate" value="{{$user->id}}">
                                            <input type="hidden" name="quit" value="1">
                    
                                            <button type="submit">Ca dégage</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        
                        <h4>Ajouter des membres</h4>
                            <form action="{{ route('tableau.update', $tableau) }}" method="post">
                                @csrf
                                @method('PUT')

                                <label>
                                    Qui voulez vous inviter ? (vous pouvez selectionner plusieurs personnes avec ctrl)
                                    <select multiple name="user[]" required>
                                        @foreach ($allUsers as $optionUser)
                                            <option
                                                value={{ $optionUser->id }}
                                                @if (   $optionUser == $tableau->user //Le créateur du tableau
                                                        || array_search($optionUser->toArray()['id'], array_column($tableau->users->toArray(), 'id')) !== false //Les gens déjà dans le tableau
                                                    )
                                                    disabled
                                                    style="display: none"
                                                @endif
                                            >
                                                {{ $optionUser->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>

                                <button type="submit">Valider</button>
                            </form>
                @endif

                <h3>Modifier le tableau</h3>
                <form action="{{ route('tableau.update', $tableau) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label>
                        Nom du  tableau :
                        <input type="text" placeholder="Nom du tableau"  name="nom" required value="{{$tableau->nom}}">
                    </label>
            
                    <label>
                        Description :
                        <textarea name="description" cols="30" rows="10" placeholder="Description du tableau...">{{$tableau->description}}</textarea>
                    </label>
            
                    <label>
                        Icône :
                        <input type="file" name="icone" accept="image/png, image/jpeg" disabled> <!-- disabled car ça marche pas, vous m'avez saoulé -->
                    </label>

                    <button type="submit">Modifier</button>
                </form>
                
                <h3>Supprimer le tableau</h3>
                <form action="{{ route('tableau.destroy', $tableau) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">X</button>
                </form>
            @else
                @if($tableau->prive)
                    <form action="{{ route('tableau.update', $tableau) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="userToUpdate" value="{{$user->id}}">
                        <input type="hidden" name="quit" value="1">

                        <button type="submit">Quitter le tableau</button>
                    </form>
                @endif
            @endif
        
    @else
        <p>Vous n'avez pas accès à ce tableau !</p>
    @endcan
</body>
</html>