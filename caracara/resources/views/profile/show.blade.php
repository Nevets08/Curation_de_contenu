<x-app-layout title="profil">
    <aside>
        <section>
            <h2>MENU</h2>
            <ul class="liens_menu_aside">
                <li><a href="{{ route('home') }}">Retourner à l'accueil</a></li>
                <li><a href="#">Tableaux privés</a></li>
                <li><a href="#">Tableaux publics</a></li>
                <li><a href="#">Vos publications sauvegardés</a></li>
            </ul>
        </section>
    </aside>

    <main class="page_profile">
        <section class="infos">
            <div class="infos_top">
                <h1 class="infos_nom">Nom Prénom</h1>
                <a class="infos_button_edit" href="#">Modifier</a>
            </div>
            <p><a href="#">Accueil</a> / Profil</p>
            <img style="object-fit: contain" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia. Excepteur sint occaecat cupidatat non proident, sunt
                in culpa qui officia.</p>
        </section>

        <section class="tableaux_suivi">
            <h2>Tableaux suivis</h2>
            <div class="tableaux_suivi_slider slider">
                <div>
                    <img src="{{ asset('img/rond_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rond_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rond_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rond_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rond_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rond_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rond_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rond_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rond_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rond_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rond_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rond_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rond_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rond_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
            </div>
            <p class="buttonAdd"><a href="#">Proposer un article</a></p>
        </section>

        <section class="tableaux_prives">
            <h2>Tableaux privés</h2>
            <div class="tableaux_prives_slider slider ">
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
                <div>
                    <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                    <p>Lorem Ipsum</p>
                </div>
            </div>
            <p class="buttonAdd"><a href="#">Créer un tableau privé</a></p>
        </section>

        <section class="publications_sauvegardees">
            <h2>Publications sauvegardées</h2>
            <div class="publications_sauvegardees_slider slider slider_articles_miniatures">
                <div>
                    <article class="article-miniature">
                        <img src="{{ asset('img/carre_vide.png') }}" alt="">
                        <p class="article-miniature-headline">Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia.</p>
                        <p class="article-miniature-infos">Par <a href="#">Nom Prénom</a> dans <a href="#">Anglais</a>
                        </p>
                    </article>
                    <article class="article-miniature">
                        <img src="{{ asset('img/carre_vide.png') }}" alt="">
                        <p class="article-miniature-headline">Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia.</p>
                        <p class="article-miniature-infos">Par <a href="#">Nom Prénom</a> dans <a href="#">Anglais</a>
                        </p>
                    </article>
                </div>
                <div>
                    <article class="article-miniature">
                        <img src="{{ asset('img/carre_vide.png') }}" alt="">
                        <p class="article-miniature-headline">Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia.</p>
                        <p class="article-miniature-infos">Par <a href="#">Nom Prénom</a> dans <a href="#">Anglais</a>
                        </p>
                    </article>
                    <article class="article-miniature">
                        <img src="{{ asset('img/carre_vide.png') }}" alt="">
                        <p class="article-miniature-headline">Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia.</p>
                        <p class="article-miniature-infos">Par <a href="#">Nom Prénom</a> dans <a href="#">Anglais</a>
                        </p>
                    </article>
                </div>
                <div>
                    <article class="article-miniature">
                        <img src="{{ asset('img/carre_vide.png') }}" alt="">
                        <p class="article-miniature-headline">Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia.</p>
                        <p class="article-miniature-infos">Par <a href="#">Nom Prénom</a> dans <a href="#">Anglais</a>
                        </p>
                    </article>
                    <article class="article-miniature">
                        <img src="{{ asset('img/carre_vide.png') }}" alt="">
                        <p class="article-miniature-headline">Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia.</p>
                        <p class="article-miniature-infos">Par <a href="#">Nom Prénom</a> dans <a href="#">Anglais</a>
                        </p>
                    </article>
                </div>
            </div>
            <p class="button"><a href="#">Voir toutes les publications sauvegardés</a></p>
        </section>

        <section class="derniers_posts">
            <h2>Derniers posts</h2>
            <div class="derniers_posts_slider slider slider_articles_miniatures">
                <div>
                    <article class="article-miniature">
                        <img src="{{ asset('img/carre_vide.png') }}" alt="">
                        <p class="article-miniature-headline">Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia.</p>
                        <p class="article-miniature-infos">Par <a href="#">Nom Prénom</a> dans <a href="#">Anglais</a>
                        </p>
                    </article>
                    <article class="article-miniature">
                        <img src="{{ asset('img/carre_vide.png') }}" alt="">
                        <p class="article-miniature-headline">Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia.</p>
                        <p class="article-miniature-infos">Par <a href="#">Nom Prénom</a> dans <a href="#">Anglais</a>
                        </p>
                    </article>
                </div>
                <div>
                    <article class="article-miniature">
                        <img src="{{ asset('img/carre_vide.png') }}" alt="">
                        <p class="article-miniature-headline">Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia.</p>
                        <p class="article-miniature-infos">Par <a href="#">Nom Prénom</a> dans <a href="#">Anglais</a>
                        </p>
                    </article>
                    <article class="article-miniature">
                        <img src="{{ asset('img/carre_vide.png') }}" alt="">
                        <p class="article-miniature-headline">Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia.</p>
                        <p class="article-miniature-infos">Par <a href="#">Nom Prénom</a> dans <a href="#">Anglais</a>
                        </p>
                    </article>
                </div>
                <div>
                    <article class="article-miniature">
                        <img src="{{ asset('img/carre_vide.png') }}" alt="">
                        <p class="article-miniature-headline">Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia.</p>
                        <p class="article-miniature-infos">Par <a href="#">Nom Prénom</a> dans <a href="#">Anglais</a>
                        </p>
                    </article>
                    <article class="article-miniature">
                        <img src="{{ asset('img/carre_vide.png') }}" alt="">
                        <p class="article-miniature-headline">Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia.</p>
                        <p class="article-miniature-infos">Par <a href="#">Nom Prénom</a> dans <a href="#">Anglais</a>
                        </p>
                    </article>
                </div>
            </div>
            <p class="button"><a href="#">Voir touts les derniers posts</a></p>
        </section>

        <div class="sidebar sidebarProfile">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border/>
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border/>
            @endif
        </div>
    </main>
</x-app-layout>
