@php
    //Recuperer titre, description et image d'un article
    $public = public_path('php/OpenGraph.php');

    require_once($public);
    $url = $post->url;
    $graph = OpenGraph::fetch($url);
    foreach ($graph as $key => $value) {
        if ($key === "title")       {$title = $value;}
        if ($key === "description") {$description = $value;}
        if ($key === "image")       {$image = $value;}
    }

    //Recuperer la différence entre la date de création et maintenant
    $first_date = new DateTime("now");
    $second_date = new DateTime(date('d-m-Y H:i:s', strtotime($post->created_at)));
    $difference = $first_date->diff($second_date);
    $date = format_interval($difference);


@endphp

<article class="article-card" onclick="window.open('{{$post->url}}')">
        <div class="article-infos">
            <p class="article-auteur"><a href="#"><img class="article-auteur-image"
                                                       src="{{ $post->user->profile_photo_url }}"
                                                       alt="">{{$post->user->name}}</a>&nbspdans&nbsp<a
                    href="#">{{$post->tableaux[0]->nom}}</a></p>
            <p class="article-date">{{ $date }}</p>
        </div>
        <h2>{{$title}}</h2>
        <p class="article-headline">@isset($description){{ $description }} @endisset</p>
        <img class="article-image" src="@isset($image){{ $image }} @endisset" alt="">
        <div class="article-footer">
            <div class="article-likes">
                {{-- likes --}}
                @php
                    $user = Auth::user();
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

                        <button type="submit"><i style="margin-right: 5px;"
                                                 class="far fa-heart"></i> {{count($post->likes)}}</button>
                    </form>
                @else
                    <form action="{{ route('post.update', $post) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user" value="{{$user->id}}">
                        <input type="hidden" name="like" value="0">

                        <button type="submit"><i style="margin-right: 5px;"
                                                 class="fas fa-heart"></i>{{count($post->likes)}}
                        </button>
                    </form>
                @endif
                <span></span>
            </div>
            {{-- <a href=""><i style="margin-right: 5px;" class="far fa-heart"></i>605</a> --}}
            {{-- <div class="article-favoris"><a href=""><i style="margin-right: 5px;" class="far fa-bookmark"></i>Ajouter aux favoris</a></div> --}}
            <div class="article-Retweet"><a href=""><i style="margin-right: 5px;" class="fas fa-retweet"></i>Retweet</a></div>
            <div class="article-partager">
                <a class="article-partager" href="#">Partager</a>
                <div class="article-partager-liens">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{$post->url}}">Facebook</a>
                    <a href="https://twitter.com/intent/tweet?text={{$post->url}}">Twitter</a>
                    <a href="https://www.linkedin.com/shareArticle?url={{$post->url}}">LinkedIn</a>
                </div>
            </div>
        </div>
    </a>
</article>

