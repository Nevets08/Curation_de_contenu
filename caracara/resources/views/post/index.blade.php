<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Posts</title>
</head>
<body>
    @foreach ($posts as $post)
        @can('view', $post)
            <div style="margin: 50px">
                <a href="{{ $post->url }}" target="_blank">{titre du lien}</a>
                <p>Post créé par {{ $post->user->name }}</p>
                <p>Post présent sur les tableaux :</p>
                <ul>
                    @foreach ($post->tableaux as $tab)
                        <li>{{ $tab->nom }}</li>
                    @endforeach
                </ul>
 
                {{-- variable qui me permet de vérifier si l'utilisateur a déjà liké le post --}}
                @php
                    $userHasLiked = false;
                    foreach ($post->likes as $item){
                        if (isset($item->id) && $item->id === $user->id)
                            $userHasLiked = true;
                    }
                @endphp

                @if (!$userHasLiked)
                    <form action="{{ route('post.update', $post) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user" value="{{$user->id}}">
                        <input type="hidden" name="like" value="1">

                        <button type="submit">Like :)</button>
                    </form>
                @else
                    <form action="{{ route('post.update', $post) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user" value="{{$user->id}}">
                        <input type="hidden" name="like" value="0">

                        <button type="submit">Unlike :(</button>
                    </form>
                @endif
                
                <p>Likes : {{ $post->likes->count() }}</p>
                <p>Reposts : {{ $post->tableaux->count()-1 }}</p>
                <p>Supprimer le post</p>
                    <form action="{{ route('post.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">X</button>
                    </form>
            </div>
        @endcan
    @endforeach
</body>
</html>