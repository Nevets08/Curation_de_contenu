<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $tableau->nom }}</title>
</head>
<body>
    <h1>{{ $tableau->nom }}</h1>
    <p>{{ $tableau->description }}</p>
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

    @if ($user)
        <h2>Paramètres su tableau</h2>
        <h3>Ajouter un post</h3>
            <form action="{{ route('post.store') }}" method="post" style="display: flex; flex-direction: column">
                @csrf

                <label>
                    A quel(s) tableau(x) souhaitez-vous l'ajouter ? (vous pouvez selectionner plusieurs tableaux avec ctrl)
                    <select multiple required name="tableau[]">
                        @foreach ($allTableaux as $tab)
                            <option
                                value={{ $tab->id }}
                                @if ( $tab->id === $tableau->id )
                                    selected
                                @endif
                            >
                                {{ $tab->nom }}
                            </option>
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
        <h3>Gérer les membres</h3>
        @if ($tableau->prive)
            <h3>Quitter le tableau</h3>
        @endif
    @endif
    
</body>
</html>