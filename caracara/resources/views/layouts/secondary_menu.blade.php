<ul class="liens_menu_aside">
    <li><a href="{{ route('home') }}">Retourner à l'accueil</a></li>
    <li><a href="{{ route('all_private_tableaux') }}">Tableaux privés</a></li>
    <li><a href="{{ route('all_public_tableaux') }}">Tableaux publics</a></li>
    @if(isset(Auth::user()->tableauSaved))
    <li><a href="{{ route('saved_posts', ['tabID' => Auth::user()->tableauSaved->id]) }}">Vos publications sauvegardées</a></li>
    @endif
</ul>
