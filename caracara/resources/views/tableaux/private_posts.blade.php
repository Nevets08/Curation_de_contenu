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

    <main>
        <div class="title">
            <h1>Tableau privé 1</h1>
            <i class="fas fa-sliders-h"></i>
        </div>

        <div class="breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <span>/ Vos tableaux privés</span>
        </div>

        <div class="posts">
            <div class="posts-infos">
                <h2>Dernières publications</h2>

                <div class="actions">
                    <span>Trier par : Nouveautés</span>
                    <a href="{{ route('add_post') }}"><i class="fas fa-plus-circle"></i>Ajouter une publication</a>*
                </div>
            </div>

            <article class="article-card">
                <div class="article-infos">
                    <p class="article-auteur"><a href="#"><img class="article-auteur-image"
                                                               src="{{ asset('img/Rond.png') }}" alt="">Nom Prénom</a>&nbspdans&nbsp<a
                            href="#">Anglais</a></p>
                    <p class="article-date">Il y a 1h</p>
                </div>
                <p class="article-headline">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor #incididunt ero labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco poriti laboris nisi ut aliquip ex ea commodo consequat.</p>
                <img class="article-image" src="{{ asset('img/Rectangle.png') }}" alt="">
                <div class="article-footer">
                    <div class="article-likes"><a href=""><i style="margin-right: 5px;" class="far fa-heart"></i>605</a>
                    </div>
                    <div class="article-favoris"><a href=""><i style="margin-right: 5px;" class="far fa-bookmark"></i>Ajouter
                            aux favoris</a></div>
                    <div class="article-Retweet"><a href=""><i style="margin-right: 5px;" class="fas fa-retweet"></i>Retweet</a>
                    </div>
                    <div class="article-partager">
                        <a class="article-partager" href="#" onclick="tooglePartageDiv()">Partager</a>
                        <div class="article-partager-liens">
                            <a href="#">Facebook</a>
                            <a href="#">Twitter</a>
                            <a href="#">Email</a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </main>

    <div class="sidebar sidebarTableau">
        <div>
            <h2>Paramètres du tableau</h2>
        </div>
            <img src="" alt="">
            <h2>Tableau privé 1</h2>
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-plus"></i>
                        <p>Ajouter une publication</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-users"></i>
                        <p>Gérer les membres</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-chart-pie"></i>
                        <p>Voir les statistiques</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-book"></i>
                        <p>Générer une bibliographie</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="far fa-comment-alt"></i>
                        <p>Proposer un lien à ajouter</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-search"></i>
                        <p>Rechercher dans le tableau</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="far fa-times-circle"></i>
                        <p>Quitter le groupe</p>
                    </a>
                </li>
            </ul>
        </div>


</x-app-layout>
