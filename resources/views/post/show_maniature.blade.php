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

    //Afficher le bon tableau
    $tableauAafficher = '';
    if(isset($tableau) && $tableau->id != Auth::user()->tableauSaved->id){ // 1) Est-ce qu'on est sur la page d'un tableau, si oui on affiche celui-là
        $tableauAafficher = $tableau;
    } else {
        foreach ($post->tableaux as $postTableau) {
            if(Auth::user()->can('view', $postTableau)){ // 2) Est-ce qu'on a accès au tableau ?
                $tableauAafficher = $postTableau;
            }
            
            foreach ($postTableau->abonnes as $item){
                if ($item->id === Auth::user()->id){ // 3) Est-ce qu'on est abonné au tableau ?
                    $tableauAafficher = $postTableau;
                    $k=true; //Variable qui me permet de sortir deux fois de la boucle
                    break;
                }
            }
            if(isset($k))
                break;
        }
    }
@endphp

<article class="article-miniature">
    @if(isset($image))
        <img src="{{ $image }}" alt="{{$title}}">
    @endif

    <p class="article-miniature-headline">
        <a href="{{$post->url}}" target="_blank">@isset($title){{ $title }} @endisset</a>
    </p>
    <p class="article-miniature-infos">
        Dans <a href="{{ route("tableau.show", $tableauAafficher) }}">{{$tableauAafficher->nom}}</a>
    </p>
</article>
