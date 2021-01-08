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
    @endforeach
</body>
</html>