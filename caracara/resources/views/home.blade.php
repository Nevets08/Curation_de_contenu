<x-app-layout title="home">
    <aside>
        <section>
            <h2>Tableau privés</h2>
            <div class="tableaux_miniatures">
                @foreach ($tableaux as $tableau)
                    @can('view', $tableau){{--Si on a bien accès au tableau--}}
                        <div>
                            <a href="{{ route('private_posts') }}">
                                <img src="
                                    @if ($tableau->url_icone)
                                        {{ $tableau->url_icone }}
                                    @else
                                        {{ asset('img/rectangle_vide.png') }}
                                    @endif" alt="">
                                <p>{{$tableau->nom}}</p>
                            </a>
                        </div>
                    @endcan
                @endforeach
            </div>
            <button><a href="{{ route("add_tableau") }}">Créer</a></button>
        </section>
        <section>
            <h2>Publications sauvegardées</h2>
            <article class="article-miniature">
                <img src="{{ asset('img/carre_vide.png') }}" alt="">
                <p class="article-miniature-headline">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p>
                <p class="article-miniature-infos">Par <a href="#">Nom Prénom</a> dans <a href="#">Anglais</a></p>
            </article>
        </section>
    </aside>
    <main>
        <section>
            <h2>Mes tableaux publics</h2>
            <div class="tableaux_publics">
                @foreach ($tableaux as $tableau)
                    @can('view', $tableau){{--Si on a bien accès au tableau--}}
                        <div onclick="window.location = '{{ route("private_posts") }}'"><img src=" @if ($tableau->url_icone)
                            {{ $tableau->url_icone }}
                        @else
                            {{ asset('img/rond_vide.png') }}
                            @endif" alt=""><p>{{$tableau->nom}}</p></div>
                    @endcan
                @endforeach
            </div>
        </section>
        <section>
            @foreach ($posts as $post)
            @can('abonnement', $post)
            @php
                $url = $post->url;

                $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
                $context = stream_context_create($opts);

                preg_match("/<title>(.+)<\/title>/siU", file_get_contents($url, false, $context), $articleTitle);
                preg_match('/<meta property="og:description" content="(.+)"\/>/siU', file_get_contents($url, false, $context), $articleDescription);
                preg_match('/<meta property="og:image" content="(.+)"\/>/siU', file_get_contents($url, false, $context), $articleImage);

                $title = $articleTitle[1];
                $description = isset($articleDescription[1]) ? $articleDescription[1] : null;
                $image = isset($articleImage[1]) ? $articleImage[1] : null;
            @endphp
                <article class="article-card">
                    <div class="article-infos">
                        <p class="article-auteur"><a href="#"><img class="article-auteur-image" src="{{ $post->user->profile_photo_url }}" alt="">{{$post->user->name}}</a>&nbspdans&nbsp<a href="#">{{$post->tableaux[0]->nom}}</a></p>
                        <p class="article-date">Il y a 1h</p>
                    </div>
                    <h2><a href="{{$post->url}}">{{$title}}</a></h2>
                    <p class="article-headline">{{$description}}</p>
                    <img class="article-image" src="{{ $image }}" alt="">
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

                                    <button type="submit"><i style="margin-right: 5px;" class="far fa-heart"></i>  {{count($post->likes)}}</button>
                                </form>
                            @else
                                <form action="{{ route('post.update', $post) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="user" value="{{$user->id}}">
                                    <input type="hidden" name="like" value="0">

                                    <button type="submit"><i style="margin-right: 5px;" class="fas fa-heart"></i>{{count($post->likes)}}</button>
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
                </article>
            @endcan
            @endforeach
            
        </section>

    </main>

<footer>

</footer>

<script>
    function tooglePartageDiv() {
        document.querySelector(".article-partager-liens").classList.toggle("show");
    }
</script>

</x-app-layout>
