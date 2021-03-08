<x-app-layout title="tableau">

    <aside>
        <section>
            <h2>MENU</h2>
            @include('layouts.secondary_menu')
        </section>
    </aside>

    <main>
        <div class="title">
            <h1>Vos tableaux privés</h1>
        </div>

        <div class="breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <span>/ Vos tableaux privés</span>
        </div>

        <div class="tableaux">
            @foreach ($tableaux as $tableau)
            @can('view', $tableau)
                <div>
                    <img src="
                        @if ($tableau->url_icone)
                            {{$tableau->url_icone}}
                        @else
                            {{ asset('img/rectangle_vide.png') }}
                        @endif
                    " alt="">
                    <h2>{{$tableau->nom}}</h2>
                    <p>Créé par <a href="#">{{$tableau->user->name}}</a></p>
                </div>
                @endcan
            @endforeach
        </div>
    </main>

</x-app-layout>
