@php
    //Recuperer titre, description et image d'un article
    $public = public_path('php/OpenGraph.php');

    require_once($public);
    $url = $post->url;
    $graph = OpenGraph::fetch($url);
    if($graph){
        foreach ($graph as $key => $value) {
            if ($key === 'title') {
                $title = $value;
            }
            if ($key === 'description') {
                $description = $value;
            }
            if ($key === 'image') {
                $image = $value;
            }
        }
    } else {
        $title = "Article Invalide";
        $description = "Oups ! On dirait que l'article n'existe pas ! Cela peut être dû à une url invalide par exemple.";
    }
@endphp

<article class="article-miniature">
    <img src="@if(isset($image)){{ $image }} @else{{ asset('img/carre_vide.png') }}@endif" alt="{{$title}}">
    <p class="article-miniature-headline"><a href="{{$post->url}}" target="_blank">@isset($title){{ $title }} @endisset</a></p>
    <p class="article-miniature-infos">Dans <a href="#">{{$post->tableaux[0]->nom}}</a></p>
</article>
