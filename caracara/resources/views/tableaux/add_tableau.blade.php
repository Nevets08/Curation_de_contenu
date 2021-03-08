<x-app-layout title="tableau">

    <aside>
        <section>
            <h2>MENU</h2>
            @include('layouts.secondary_menu')
        </section>

        <section class="members">
            <h2>Membres du tableau</h2>
            @include('layouts.members_posts')
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

        <form action="#">
            <label>Nom du nouveau tableau
                <input type="url" placeholder="nom du tableau" required>
            </label>

            <label>Description du tableau
                <textarea placeholder="Courte descirption du tableau" required></textarea>
            </label>

            <label class="booleanChoice row">
                <label>Privé <input type="radio" name = "yes" value="Privé" checked></label>
                <label>Public <input type="radio" name = "no" value="Public"></label>
            </label>

            <label>Qui voulez-vous inviter ?
                <select>
                    <option value="0">Personne 1</option>
                    <option value="1">Personne 2</option>
                </select>
            </label>

            <label class="booleanChoice">Les personnes peuvent-elles quitter le tableau ?
                <label>Oui
                    <input type="radio" name = "yes" value="Oui" checked>
                </label>
                <label>Non
                    <input type="radio" name = "no" value="Non">
                </label>
            </label>

            <div class="group_buttons">
                <a class="retour_creationPost" href="#">Revenir en arrière</a>
                <button type="submit">Créer le tableau</button>
            </div>

        </form>

    </main>

</x-app-layout>
