@php
    //Recuperer titre, description et image d'un article
    $public = public_path('php/OpenGraph.php');

    require_once $public;
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


    //Recuperer la différence entre la date de création et maintenant
    $first_date = new DateTime('now');
    $second_date = new DateTime(date('d-m-Y H:i:s', strtotime($post->created_at)));
    $difference = $first_date->diff($second_date);
    $date = format_interval($difference);
@endphp

<article class="article-miniature">
    <img src="@if(isset($image)){{ $image }} @else{{ asset('img/carre_vide.png') }}@endif" alt="{{$title}}">
    <p class="article-miniature-headline"><a href="{{$post->url}}" target="_blank">@isset($title){{ $title }} @endisset</a></p>
    <p class="article-miniature-infos">Dans <a href="{{ route("tableau.show", $post->tableaux[0]) }}">{{$post->tableaux[0]->nom}}</a></p>
</article>
