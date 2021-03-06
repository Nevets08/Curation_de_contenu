require('./bootstrap');

require('alpinejs');

require('slick-carousel');

//Bouton partage
const button_partage = document.querySelectorAll(".article-card a.article-partager");
if (button_partage !== null) {
    for (var i = 0; i < button_partage.length; i++) {
        const buttonPartageElement = button_partage[i];
        buttonPartageElement.addEventListener("click", ClickButtonPartage);
    }
}

function ClickButtonPartage(e) {
    this.nextElementSibling.classList.toggle("show");
    e.preventDefault();
    e.stopPropagation();
}

//Stop propagation sur liens d'un post
const elements = document.querySelectorAll('.article-remove form button, .article-likes form button, .article-favoris form button, .article-card div.article-partager-liens a, .article-card .article-auteur a');
if (elements !== null) {
    for (var i = 0; i < elements.length; i++) {
        const element = elements[i];
        element.addEventListener("click", function (e) {
            e.stopPropagation();
        });
    }
}

//User boutton dropdown
const userButton = document.querySelector("header #userButton");
userButton.addEventListener("click", ClickUserButton);

function ClickUserButton() {
    document.querySelector("#userMenu").classList.toggle("showUserMenu");
}

//SearchBar
const icone_search = document.querySelector("header .fa-search");
icone_search.addEventListener("click", ClickSearchIcone);

function ClickSearchIcone() {
    document.querySelector("#search-form").classList.toggle("showSearchBar");
}

//SideBar userProfile
const button_edit_profile = document.querySelector(".infos_button_edit");
const button_tableau_options = document.querySelector(".title i");
if (button_edit_profile !== null) {
    button_edit_profile.addEventListener("click", DisplaySideBar);
}
if (button_tableau_options !== null) {
    button_tableau_options.addEventListener("click", DisplaySideBar);
}

function DisplaySideBar() {
    document.querySelector(".sidebar").classList.toggle("showSideBar");
    this.style.zIndex = "15";

    if (document.querySelector(".sidebar").classList.contains("showSideBar") && document.body.classList.contains("profil")) {
        button_edit_profile.innerHTML = "Retour au profil"
        button_edit_profile.style.position = "absolute";
        button_edit_profile.style.top = "0";
        button_edit_profile.style.right = "0";
    } else if (document.body.classList.contains("profil")) {
        button_edit_profile.innerHTML = "Modifier "
        button_edit_profile.style.position = "initial";
    }

    if (document.querySelector(".sidebar").classList.contains("showSideBar") && document.body.classList.contains("tableau")) {
        button_tableau_options.classList.replace("fa-sliders-h", "fa-arrow-left");
        button_tableau_options.style.position = "absolute";
        button_tableau_options.style.top = "16px";
        button_tableau_options.style.left = "0";
        button_tableau_options.style.fontSize = "font-size: 3rem;";
    } else if (document.body.classList.contains("tableau")) {
        button_tableau_options.classList.replace("fa-arrow-left", "fa-sliders-h");
        button_tableau_options.style.position = "initial";
        button_tableau_options.style.fontSize = "font-size: xx-large;";
    }
}


//DarkMode
const DarkModeSwitchButton = document.querySelector(".menu-right-fixed > i");
const body = document.body;
const logo = document.querySelector("img.logo");

if (DarkModeSwitchButton !== null) {
    DarkModeSwitchButton.addEventListener("click", DarkMode);
}

function DarkMode() {
    if (body.classList.contains("darkTheme")) {
        localStorage.setItem('darkTheme', 'no');
    } else if (body.classList.contains("lightTheme")) {
        localStorage.setItem('darkTheme', 'yes');
    }
    DarkModeLogo();
}

(function () {
    DarkModeLogo();
}());

function DarkModeLogo() {
    if (localStorage.getItem('darkTheme') === "yes") {
        body.classList.replace("lightTheme", "darkTheme");
        logo.src = url + "/Logo-DarkMode.png";
        DarkModeSwitchButton.classList.replace("far", "fas");
    } else {
        body.classList.replace("darkTheme", "lightTheme");
        logo.src = url + "/Logo.png";
        DarkModeSwitchButton.classList.replace("fas", "far");
    }
}

//Modal creation tableau
const lienCreateTableau = document.querySelector(".createTableau");
if (lienCreateTableau !== null) {
        // retweetButtonElement.addEventListener("click", displayModalRetweet);
        lienCreateTableau.addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();
            var modal = document.querySelector(".modal.create-tableau");
            modal.classList.add("show");

            window.addEventListener("click", function () {
                modal.classList.remove("show");
            });
            modal.firstElementChild.addEventListener("click", function (e) {
                e.stopPropagation();
            });
        });
}

//Modal Repost
const retweetButton = document.querySelectorAll(".article-Retweet a");
if (retweetButton !== null) {
    for (var k = 0; k < retweetButton.length; k++) {
        const retweetButtonElement = retweetButton[k];
        // retweetButtonElement.addEventListener("click", displayModalRetweet);
        retweetButtonElement.addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();
            const modal = retweetButtonElement.closest("article").nextElementSibling;
            modal.classList.add("show");

            window.addEventListener("click", function () {
                modal.classList.remove("show");
            });
            modal.firstElementChild.addEventListener("click", function (e) {
                e.stopPropagation();
            });
        });
    }
}

//Modal liste membres
const seeMembersButton = document.querySelector(".members button");
if (seeMembersButton !== null) {
    seeMembersButton.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();

        const modal = document.querySelector(".modal.members-list");
        modal.classList.add("show");
        document.body.style.overflow = "hidden";
        window.addEventListener("click", function () {
            modal.classList.remove("show");
            document.body.style.overflow = "initial";
        });
        modal.firstElementChild.addEventListener("click", function (e) {
            e.stopPropagation();
        });
    });
}

//Modal Gerer les membres
var membersManagementButton = document.querySelector(".members-management-button");
if (membersManagementButton !== null) {
    membersManagementButton.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        var modal = document.querySelector(".modal.members-management");
        modal.classList.add("show");
        document.body.style.overflow = "hidden";
        window.addEventListener("click", function () {
            modal.classList.remove("show");
            document.body.style.overflow = "initial";
        });
        modal.firstElementChild.addEventListener("click", function (e) {
            e.stopPropagation();
        });
    });
}

//Modal Editer un tableau
var editerTableauButton = document.querySelector(".edit_tableau-button");
if (editerTableauButton !== null) {
    editerTableauButton.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        var modal = document.querySelector(".modal.edit-tableau");
        modal.classList.add("show");
        document.body.style.overflow = "hidden";
        window.addEventListener("click", function () {
            modal.classList.remove("show");
            document.body.style.overflow = "initial";
        });
        modal.firstElementChild.addEventListener("click", function (e) {
            e.stopPropagation();
        });
    });
}
