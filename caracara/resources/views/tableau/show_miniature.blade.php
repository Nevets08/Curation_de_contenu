<div class="tableaux">
    @foreach ($tableaux as $tableau)
        @can('view', $tableau)
            <div onclick="window.location = '{{ route("tableau.show", $tableau) }}'">
                @if ($tableau->url_icone)
                <img src="{{$tableau->url_icone}}" alt="">
                @else
                    <img src="{{ asset('img/tableauWithoutIcon.png') }}" alt="">
                @endif
                <h2>{{$tableau->nom}}</h2>
                <p>Créé par <a href="#">{{$tableau->user->name}}</a></p>
            </div>
        @endcan
    @endforeach
</div>
