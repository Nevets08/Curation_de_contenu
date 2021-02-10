<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Posts</title>
</head>
<body>
    @foreach ($posts as $post)
        <div style="margin: 50px">
            <a href="{{ $post->url }}" target="_blank">{titre du lien}</a>
            <p>Post créé par {{ $post->user->name }}</p>
            <p>Post présent sur les tableaux :</p>
            <ul>
                @foreach ($post->tableaux as $tab)
                    <li>{{ $tab->nom }}</li>
                @endforeach
            </ul>
            <p>Likes : {{ $post->likes->count() }}</p>
            <p>Reposts : {{ $post->tableaux->count()-1 }}</p>
            <p>Supprimer le post</p>
                <form action="{{ route('post.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">X</button>
                </form>
        </div>
    @endforeach
</body>
</html>