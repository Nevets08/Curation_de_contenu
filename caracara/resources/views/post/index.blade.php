<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Posts</title>
</head>
<body>
    @foreach ($posts as $post)
        @can('abonnement', $post){{--  abonnement : pour voir les posts des tableaux auxquels on est abonné - view : pour voir tous les posts auxquels on a accès --}}
            <div style="margin: 50px">
                @php
                    $url = $post->url;

                    $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
                    $context = stream_context_create($opts);

                    preg_match("/<title>(.+)<\/title>/siU", file_get_contents($url, false, $context), $articleTitle);
                    preg_match('/<meta property="og:description" content="(.+)">/siU', file_get_contents($url, false, $context), $articleDescription);
                    preg_match('/<meta property="og:image" content="(.+)">/siU', file_get_contents($url, false, $context), $articleImage);

                    $title = $articleTitle[1];
                    $description = isset($articleDescription[1]) ? $articleDescription[1] : null;
                    $image = isset($articleImage[1]) ? $articleImage[1] : null;
                @endphp
                <h2><a href="{{ $post->url }}" target="_blank">{{$title}}</a></h2>
                @if ($description)
                    <p>{{$description}}</p>
                @endif
                @if ($image)
                    <img src="{{$image}}" style="max-height: 300px;">
                @endif
                <p>Post créé par {{ $post->user->name }}</p>
                <p>Post présent sur les tableaux :</p>
                <ul>
                    @foreach ($post->tableaux as $tab)
                        <li>{{ $tab->nom }}</li>
                    @endforeach
                </ul>
 
                {{-- likes --}}
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

                {{-- Reposts --}}
                <form action="{{ route('post.update', $post) }}" method="post">
                    @csrf
                    @method('PUT')

                    <label>
                        A quel(s) tableau(x) souhaitez-vous l'ajouter ? (vous pouvez selectionner plusieurs tableaux avec ctrl)
                        <select multiple required name="tableau[]">
                            @foreach ($allTableaux as $tab)
                                @can('addPost', $tab)
                                    <option
                                        value={{ $tab->id }}
                                        @foreach ($post->tableaux as $postTab)
                                            @if ($tab->id === $postTab->id)
                                                hidden disabled
                                            @endif
                                        @endforeach
                                    >
                                        {{ $tab->nom }}
                                    </option>
                                @endcan
                            @endforeach
                        </select>
                    </label>

                    <button type="submit">Reposter</button>
                </form>
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