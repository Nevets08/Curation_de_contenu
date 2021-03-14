<x-app-layout title="tableau">

    <aside>
        <section>
            <h2>MENU</h2>
            @include('layouts.secondary_menu')
        </section>
    </aside>

    <main class="add_post">
        <div class="title">
            <h1>Ajouter un article</h1>
        </div>

        <div class="breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <span>/ Ajouter un article</span>
        </div>

        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <label>A quel(s) tableau(x) voulez-vous l'ajouter ?
                <select multiple required name="tableau[]">
                    @foreach ($allTableaux as $tab)
                        @can('addPost', $tab)
                            <option
                                value={{ $tab->id }}
                                @if (isset($tableau) && $tab->id === $tableau->id )
                                    selected
                                @endif
                            >
                                {{ $tab->nom }}
                            </option>
                        @endcan
                    @endforeach
                </select>
                <p><a class="createTableau" href="#">Ou créer un nouveau tableau</a></p>
            </label>

            <label>Renseignez l'url de l'article
                <input type="url" placeholder="Entrez une url" name="url" required>
            </label>

            <div style="display: none">
                <input name="user_id" value="@if($user) {{$user->id}} @else anonyme @endif">
                @if (isset($tableau))
                    <input name="created_from" value="{{$tableau->id}}">
                @endif
            </div>

            <button type="submit">Envoyer !</button>
        </form>

        @include('components/modals/modal_create_tableau')

    </main>

</x-app-layout>
