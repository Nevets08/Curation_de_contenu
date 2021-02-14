<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Caracara - Vos publications sauvegardées</title>
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
            </div>
        </aside>

        <main>
            <div class="title">
                <h1>Recherche</h1>
                <a href=""><i class="fas fa-search"></i></a>
            </div>

            <div class="breadcrumb">
                <a href="{{ route('home') }}">Accueil</a>
                <span>/ Recherche</span>
            </div>

            <div class="form-search" id="form-search">
                <form action="">
                    <div class="inputs">
                        <label for="">Que cherchez-vous ?</label><br>
                        <input type="text" placeholder="Javascript...">
                    </div>

                    <div class="inputs">
                        <label for="">Dans quel tableau ?</label><br>
                        <select name="" id="">
                            <option value="">Tous</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                        </select>
                    </div>

                    <div class="inputs">
                        <label for="">Publié par :</label><br>
                        <select name="" id="">
                            <option value="">Tous</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                            <option value="">Jean</option>
                        </select>
                    </div>

                    <button type="submit">Rechercher</button>
                </form>
            </div>

            <div class="result-container">
                <h2>Résultat pour la recherche : "Javascript"</h2>

                <div class="posts">
                    <a href="">
                        <div class="post">
                            <div class="left-post">
                                <img src="https://via.placeholder.com/150x150" alt="">
                            </div>
                            <div class="right-post">
                                <div class="title">
                                    <h1>Bonjour</h1>
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, reiciendis
                                    consequatur
                                    sapiente vitae enim tempore nisi, quae eligendi, magnam numquam ipsam? Magnam vel
                                    laudantium, sint praesentium quidem dolore labore quia!
                                    Quidem itaque quae, fuga explicabo, qui eveniet odit voluptatem voluptatum officia,
                                    dolorem ea rerum obcaecati odio ratione illo labore sequi eum eius nemo magni.
                                    Ullam, et
                                    commodi! Ex, rem. Sit!
                                    Porro veritatis fuga distinctio aliquam rem id alias aliquid tempore? Rerum
                                    cupiditate
                                    culpa, tempora vel officia eveniet. Quos est modi velit rerum, consectetur cum? Ea
                                    quam
                                    ullam quidem repudiandae aut.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="posts">
                    <a href="">
                        <div class="post">
                            <div class="left-post">
                                <img src="https://via.placeholder.com/150x150" alt="">
                            </div>
                            <div class="right-post">
                                <div class="title">
                                    <h1>Bonjour</h1>
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, reiciendis
                                    consequatur
                                    sapiente vitae enim tempore nisi, quae eligendi, magnam numquam ipsam? Magnam vel
                                    laudantium, sint praesentium quidem dolore labore quia!
                                    Quidem itaque quae, fuga explicabo, qui eveniet odit voluptatem voluptatum officia,
                                    dolorem ea rerum obcaecati odio ratione illo labore sequi eum eius nemo magni.
                                    Ullam, et
                                    commodi! Ex, rem. Sit!
                                    Porro veritatis fuga distinctio aliquam rem id alias aliquid tempore? Rerum
                                    cupiditate
                                    culpa, tempora vel officia eveniet. Quos est modi velit rerum, consectetur cum? Ea
                                    quam
                                    ullam quidem repudiandae aut.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="posts">
                    <a href="">
                        <div class="post">
                            <div class="left-post">
                                <img src="https://via.placeholder.com/150x150" alt="">
                            </div>
                            <div class="right-post">
                                <div class="title">
                                    <h1>Bonjour</h1>
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, reiciendis
                                    consequatur
                                    sapiente vitae enim tempore nisi, quae eligendi, magnam numquam ipsam? Magnam vel
                                    laudantium, sint praesentium quidem dolore labore quia!
                                    Quidem itaque quae, fuga explicabo, qui eveniet odit voluptatem voluptatum officia,
                                    dolorem ea rerum obcaecati odio ratione illo labore sequi eum eius nemo magni.
                                    Ullam, et
                                    commodi! Ex, rem. Sit!
                                    Porro veritatis fuga distinctio aliquam rem id alias aliquid tempore? Rerum
                                    cupiditate
                                    culpa, tempora vel officia eveniet. Quos est modi velit rerum, consectetur cum? Ea
                                    quam
                                    ullam quidem repudiandae aut.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="posts">
                    <a href="">
                        <div class="post">
                            <div class="left-post">
                                <img src="https://via.placeholder.com/150x150" alt="">
                            </div>
                            <div class="right-post">
                                <div class="title">
                                    <h1>Bonjour</h1>
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, reiciendis
                                    consequatur
                                    sapiente vitae enim tempore nisi, quae eligendi, magnam numquam ipsam? Magnam vel
                                    laudantium, sint praesentium quidem dolore labore quia!
                                    Quidem itaque quae, fuga explicabo, qui eveniet odit voluptatem voluptatum officia,
                                    dolorem ea rerum obcaecati odio ratione illo labore sequi eum eius nemo magni.
                                    Ullam, et
                                    commodi! Ex, rem. Sit!
                                    Porro veritatis fuga distinctio aliquam rem id alias aliquid tempore? Rerum
                                    cupiditate
                                    culpa, tempora vel officia eveniet. Quos est modi velit rerum, consectetur cum? Ea
                                    quam
                                    ullam quidem repudiandae aut.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="posts">
                    <div class="post">
                        <a href="">
                            <div class="left-post">
                                <img src="https://via.placeholder.com/150x150" alt="">
                            </div>
                            <div class="right-post">
                                <div class="title">
                                    <h1>Bonjour</h1>
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, reiciendis
                                    consequatur
                                    sapiente vitae enim tempore nisi, quae eligendi, magnam numquam ipsam? Magnam vel
                                    laudantium, sint praesentium quidem dolore labore quia!
                                    Quidem itaque quae, fuga explicabo, qui eveniet odit voluptatem voluptatum officia,
                                    dolorem ea rerum obcaecati odio ratione illo labore sequi eum eius nemo magni.
                                    Ullam, et
                                    commodi! Ex, rem. Sit!
                                    Porro veritatis fuga distinctio aliquam rem id alias aliquid tempore? Rerum
                                    cupiditate
                                    culpa, tempora vel officia eveniet. Quos est modi velit rerum, consectetur cum? Ea
                                    quam
                                    ullam quidem repudiandae aut.
                                </p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="new-search">
                    <h3>Effectuer une nouvelle recherche</h3>
                    <a href="#form-search">
                        <i class="far fa-arrow-alt-circle-up"></i>
                    </a>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
