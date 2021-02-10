<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Caracara - Vos tableaux privés</title>
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}" />
</head>

<body>
    <div class="menu-right-fixed">
        <i class="fas fa-plus"></i>
        <i class="fas fa-envelope-open-text"></i>
        <i class="far fa-moon"></i>
    </div>

    <div class="main-container">
        <aside>
            <nav>
                <h3>menu</h3>
                <div class="border"></div>
                <ul>
                    <li><a href="{{ route('home') }}">Retourner à l'accueil <i class="fas fa-home"></i></a></li>
                    <li><a href="{{ route('private_posts') }}">Tableaux privés</a></li>
                    <li><a href="">Tableaux publics</a></li>
                    <li><a href="{{ route('saved_posts') }}">Vos publications sauvegardées</a></li>
                </ul>
            </nav>
            <div class="members">
                <h3>membres du tableau</h3>
                <div class="border"></div>

                <div class="members-line">
                    <img src="https://via.placeholder.com/45x45" alt="">
                    <img src="https://via.placeholder.com/45x45" alt="">
                    <img src="https://via.placeholder.com/45x45" alt="">
                    <img src="https://via.placeholder.com/45x45" alt="">
                    <img src="https://via.placeholder.com/45x45" alt="">
                </div>

                <div class="members-line">
                    <img src="https://via.placeholder.com/45x45" alt="">
                    <img src="https://via.placeholder.com/45x45" alt="">
                    <img src="https://via.placeholder.com/45x45" alt="">
                    <img src="https://via.placeholder.com/45x45" alt="">
                    <img src="https://via.placeholder.com/45x45" alt="">
                </div>

                <div class="members-line">
                    <img src="https://via.placeholder.com/45x45" alt="">
                    <img src="https://via.placeholder.com/45x45" alt="">
                    <img src="https://via.placeholder.com/45x45" alt="">
                    <img src="https://via.placeholder.com/45x45" alt="">
                    <div class="more-members">
                        <span>+7</span>
                    </div>
                </div>

                <a href=""><i class="fas fa-users"></i> Liste des membres</a>
            </div>
        </aside>

        <main>
            <div class="title">
                <h1>Vos tableaux privés</h1>
                <a href=""><i class="fas fa-sliders-h"></i></a>
            </div>

            <div class="breadcrumb">
                <a href="{{ route('home') }}">Accueil</a>
                <span>/ Vos tableaux privés</span>
            </div>

            <div class="posts">
                <div class="posts-infos">
                    <span>Dernières publications</span>

                    <div class="actions">
                        <span>Trier par : Nouveautés</span>
                        <a href=""><i class="fas fa-plus-circle"></i>Ajouter une publication</a>
                    </div>

                </div>
                <div class="post">
                    <div class="header-post">
                        <div class="name-photo">
                            <img src="https://via.placeholder.com/45x45" alt="">
                            <p>Nom Prénom</p>
                        </div>
                        <span>Il y a 1h</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor #incididunt ero
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco poriti
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <img class="content-post" src="https://via.placeholder.com/800x150" alt="">

                    <div class="footer-post">
                        <div class="left-footer-post">
                            <a href=""><i class="far fa-heart"></i> 605</a>
                            <a href=""><i class="fas fa-bookmark"></i> Ajouter aux favoris</a>
                            <a href=""><i class="fas fa-retweet"></i> Retweet</a>
                        </div>
                        <div class="right-footer-post">
                            Partager
                        </div>
                    </div>
                </div>

                <div class="post">
                    <div class="header-post">
                        <div class="name-photo">
                            <img src="https://via.placeholder.com/45x45" alt="">
                            <p>Nom Prénom</p>
                        </div>
                        <span>Il y a 1h</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor #incididunt ero
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco poriti
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <img class="content-post" src="https://via.placeholder.com/800x150" alt="">

                    <div class="footer-post">
                        <div class="left-footer-post">
                            <a href=""><i class="far fa-heart"></i> 605</a>
                            <a href=""><i class="fas fa-bookmark"></i> Ajouter aux favoris</a>
                            <a href=""><i class="fas fa-retweet"></i> Retweet</a>
                        </div>
                        <div class="right-footer-post">
                            Partager
                        </div>
                    </div>
                </div>

                <div class="post">
                    <div class="header-post">
                        <div class="name-photo">
                            <img src="https://via.placeholder.com/45x45" alt="">
                            <p>Nom Prénom</p>
                        </div>
                        <span>Il y a 1h</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor #incididunt ero
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco poriti
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <img class="content-post" src="https://via.placeholder.com/800x150" alt="">

                    <div class="footer-post">
                        <div class="left-footer-post">
                            <a href=""><i class="far fa-heart"></i> 605</a>
                            <a href=""><i class="fas fa-bookmark"></i> Ajouter aux favoris</a>
                            <a href=""><i class="fas fa-retweet"></i> Retweet</a>
                        </div>
                        <div class="right-footer-post">
                            Partager
                        </div>
                    </div>
                </div>

                <div class="post">
                    <div class="header-post">
                        <div class="name-photo">
                            <img src="https://via.placeholder.com/45x45" alt="">
                            <p>Nom Prénom</p>
                        </div>
                        <span>Il y a 1h</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor #incididunt ero
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco poriti
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <img class="content-post" src="https://via.placeholder.com/800x150" alt="">

                    <div class="footer-post">
                        <div class="left-footer-post">
                            <a href=""><i class="far fa-heart"></i> 605</a>
                            <a href=""><i class="fas fa-bookmark"></i> Ajouter aux favoris</a>
                            <a href=""><i class="fas fa-retweet"></i> Retweet</a>
                        </div>
                        <div class="right-footer-post">
                            Partager
                        </div>
                    </div>
                </div>

                <div class="post">
                    <div class="header-post">
                        <div class="name-photo">
                            <img src="https://via.placeholder.com/45x45" alt="">
                            <p>Nom Prénom</p>
                        </div>
                        <span>Il y a 1h</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor #incididunt ero
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco poriti
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <img class="content-post" src="https://via.placeholder.com/800x150" alt="">

                    <div class="footer-post">
                        <div class="left-footer-post">
                            <a href=""><i class="far fa-heart"></i> 605</a>
                            <a href=""><i class="fas fa-bookmark"></i> Ajouter aux favoris</a>
                            <a href=""><i class="fas fa-retweet"></i> Retweet</a>
                        </div>
                        <div class="right-footer-post">
                            Partager
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
