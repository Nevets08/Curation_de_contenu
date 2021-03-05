<x-app-layout title="home">
    <aside>
        <section>
            <h2>Tableau privés</h2>
            <div class="tableaux_miniatures">
                <div>
                    <a href="{{ route("private_posts") }}">
                        <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                        <p>Lorem Ipsum</p>
                    </a>
                </div>
                <div>
                    <a href="{{ route("private_posts") }}">
                        <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                        <p>Lorem Ipsum</p>
                    </a>
                </div>
                <div>
                    <a href="{{ route("private_posts") }}">
                        <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                        <p>Lorem Ipsum</p>
                    </a>
                </div>
                <div>
                    <a href="{{ route("private_posts") }}">
                        <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                        <p>Lorem Ipsum</p>
                    </a>
                </div>
                <div>
                    <a href="{{ route("private_posts") }}">
                        <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                        <p>Lorem Ipsum</p>
                    </a>
                </div>
                <div>
                    <a href="{{ route("private_posts") }}">
                        <img src="{{ asset('img/rectangle_vide.png') }}" alt="">
                        <p>Lorem Ipsum</p>
                    </a>
                </div>
            </div>
            <button>Créer</button>
        </section>
        <section>
            <h2>Publications sauvegardées</h2>
            <article class="article-miniature">
                <img src="{{ asset('img/carre_vide.png') }}" alt="">
                <p class="article-miniature-headline">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p>
                <p class="article-miniature-infos">Par <a href="#">Nom Prénom</a> dans <a href="#">Anglais</a></p>
            </article>
        </section>
    </aside>
    <main>
        <section>
            <h2>Mes tableaux publics</h2>
            <div class="tableaux_publics">
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
                <div onclick="window.location = '{{ route("private_posts") }}'"><img src="{{ asset('img/rond_vide.png') }}" alt=""><p>Lorem Ipsum</p></div>
            </div>
        </section>
        <section>
            <article class="article-card">
                <div class="article-infos">
                    <p class="article-auteur"><a href="#"><img class="article-auteur-image" src="{{ asset('img/Rond.png') }}" alt="">Nom Prénom</a>&nbspdans&nbsp<a href="#">Anglais</a></p>
                    <p class="article-date">Il y a 1h</p>
                </div>
                <p class="article-headline">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor #incididunt ero labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco poriti laboris nisi ut aliquip ex ea commodo consequat.</p>
                <img class="article-image" src="{{ asset('img/Rectangle.png') }}" alt="">
                <div class="article-footer">
                    <div class="article-likes"><a href=""><i style="margin-right: 5px;" class="far fa-heart"></i>605</a></div>
                    <div class="article-favoris"><a href=""><i style="margin-right: 5px;" class="far fa-bookmark"></i>Ajouter aux favoris</a></div>
                    <div class="article-Retweet"><a href=""><i style="margin-right: 5px;" class="fas fa-retweet"></i>Retweet</a></div>
                    <div class="article-partager">
                        <a class="article-partager" href="#">Partager</a>
                        <div class="article-partager-liens">
                            <a href="#">Facebook</a>
                            <a href="#">Twitter</a>
                            <a href="#">Email</a>
                        </div>
                    </div>
                </div>
            </article>
        </section>

    </main>

<footer>

</footer>

<script>
    function tooglePartageDiv() {
        document.querySelector(".article-partager-liens").classList.toggle("show");
    }
</script>

</x-app-layout>
