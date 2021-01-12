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
</body>
</html>