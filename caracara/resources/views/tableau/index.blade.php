<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Caracara | Tableaux</title>
</head>
<body>
    @foreach ($tableaux as $tableau)
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
    @endforeach

    <h2>Ajouter un nouveau tableau</h2>
    <form action="{{ route('tableau.store') }}" method="post" style="display: flex; flex-direction: column">
        @csrf
    
        <label>
            Nom du nouveau tableau :
            <input type="text" placeholder="Nom du tableau"  name="nom" required >
        </label>

        <label>
            Description :
            <textarea name="description" cols="30" rows="10" placeholder="Description du tableau..." required></textarea>
        </label>

        <label>
            Visibilité :
            <label>
                <input type="radio"  name="private" value="1" checked>
                Privé
            </label>
            <label>
                <input type="radio"  name="private" value="0">
                Public
            </label>
        </label>

        <p>(Ici faudra se débrouiller ne montrer ce qui suit uniquement si le tableau est privé)</p>
        <label>
            Qui voulez vous inviter ? (vous pouvez selectionner plusieurs personnes avec ctrl)
            <select multiple name="user[]">
                @foreach ($allUsers as $optionUser)
                    <option
                        value={{ $optionUser->id }}
                        @if ( $optionUser->id === $user->id )
                            selected
                            style="display: none"
                        @endif
                    >
                        {{ $optionUser->name }}
                    </option>
                @endforeach
            </select>
        </label>

        <button type="submit">Ok</button>
    </form>
</body>
</html>