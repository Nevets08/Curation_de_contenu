<x-app-layout title="tableau">

    <aside>
        <section>
            <h2>MENU</h2>
            @include('layouts.secondary_menu')
        </section>
    </aside>

    <main>
        <div class="title">
            <h1>Vos tableaux publics</h1>
        </div>

        <div class="breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <span>/ Vos tableaux publics</span>
        </div>

        <div class="tableaux">
            @foreach ($tableaux as $tableau)
                <div onclick="window.location = '{{ route("tableau.show", $tableau) }}'">
                    <img src="
                        @if ($tableau->url_icone)
                            {{$tableau->url_icone}}
                        @else
                            {{ asset('img/tableauWithoutIcon.png') }}
                        @endif
                    " alt="">
                    <h2>{{$tableau->nom}}</h2>
                    <p>Créé par <a href="#">{{$tableau->user->name}}</a></p>
                </div>
            @endforeach
        </div>
    </main>

</x-app-layout>
