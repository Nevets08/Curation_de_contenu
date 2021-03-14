<div class="create-tableau modal">
    <div>
        <h2>Vous voulez l'ajouter à un nouveau tableau ?</h2>
        <form action="{{ route('tableau.store') }}" method="post" style="display: flex; flex-direction: column"
              enctype="multipart/form-data">
            @csrf

            <label>Nom du nouveau tableau
                <input type="text" name="nom" placeholder="nom du tableau" required>
            </label>

            <label>Description du tableau
                <textarea name="description" placeholder="Courte descirption du tableau"></textarea>
            </label>

            <label>
                Icône
                <input type="file" name="icone" accept="image/png, image/jpeg">
            </label>

            <label class="booleanChoice row">
                Votre tableau sera t-il :
                <label>Privé <input type="radio" name="prive" value="1" checked></label>
                <label>Public <input type="radio" name="prive" value="0"></label>
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

            <div class="group_buttons">
                <a class="retour_creationPost" href="#">Revenir en arrière</a>
                <button type="submit">Créer le tableau</button>
            </div>

        </form>
    </div>
</div>
