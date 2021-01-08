<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Posts</title>
</head>
<body>
    <ul>
    @foreach ($posts as $post)
        <li><a href="{{ $post->url }}" target="_blank">ALORS ICI IL VA FALLOIR RECUPERER LE TITRE DU LIEN MWAHAHAAH</a></li>
    @endforeach
    </ul>
</body>
</html>