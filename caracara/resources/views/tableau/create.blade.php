<x-app-layout title="tableau">

    <aside>
        <section>
            <h2>MENU</h2>
            @include('layouts.secondary_menu')
        </section>
    </aside>

    <main class="add_post">
        <div class="title">
            <h1>Ajouter un tableau</h1>
        </div>

        <div class="breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <span>/ Ajouter un tableau</span>
        </div>

        <form action="{{ route('tableau.store') }}" method="post" style="display: flex; flex-direction: column" enctype="multipart/form-data">
            @csrf
            <label>Nom du nouveau tableau
                <input type="text" placeholder="nom du tableau" name="nom" required>
            </label>

            <label>Description du tableau
                <textarea name="description" placeholder="Courte descirption du tableau"></textarea>
            </label>

            <label>
                Icône (1MB max)
                <input type="file" name="icone" accept="image/png, image/jpeg">
            </label>

            <label class="booleanChoice row">
                <label>Privé <input type="radio" name = "prive" value="1" checked></label>
                <label>Public <input type="radio" name = "prive" value="0"></label>
            </label>

            <label>Qui voulez-vous inviter ?
                <select multiple name="user[]">
                    @foreach ($allUsers as $optionUser)
                        <option
                            value={{ $optionUser->id }}
                            @if ( $optionUser->id === $user->id )
                                disabled
                            style="display: none"
                            @endif
                        >
                            {{ $optionUser->name }}
                        </option>
                    @endforeach
                </select>
            </label>

            {{-- <label class="booleanChoice">Les personnes peuvent-elles quitter le tableau ?
                <label>Oui
                    <input type="radio" name = "yes" value="Oui" checked>
                </label>
                <label>Non
                    <input type="radio" name = "no" value="Non">
                </label>
            </label> --}}

            <div style="display: none">
                <input type="hidden" name="user_id" value="@if($user) {{$user->id}} @endif">
            </div>

            {{-- <div class="group_buttons"> --}}
            {{-- <a class="retour_creationPost" href="#">Revenir en arrière</a> --}}
            <button type="submit">Créer le tableau</button>
            {{-- </div> --}}

        </form>

    </main>

</x-app-layout>
