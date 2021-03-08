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
            <h1>Ajouter un article</h1>
        </div>

        <div class="breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <span>/ Ajouter un article</span>
        </div>

        <form action="#">
            <label>A quel tableau voulez-vous l'ajouter ?
                <select multiple required>
                    <option value="">--Choississez au moins 1 tableau--</option>
                    <option value="1">Tableau 1</option>
                    <option value="2">Tableau 2</option>
                    <option value="3">Tableau 3</option>
                </select>
                <p><a class="createTableau" href="#">Ou créer un nouveau tableau</a></p>
            </label>

            <label>Renseignez l'url de l'article
                <input type="url" placeholder="Entrez une url" required>
            </label>

            <button type="submit">Envoyer !</button>
        </form>

        <div class="sidebar sidebarPost">
            <h2>Vous voulez l'ajouter à un nouveau tableau ?</h2>
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
        </div>

    </main>

</x-app-layout>
