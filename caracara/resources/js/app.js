require('./bootstrap');

require('alpinejs');

require('slick-carousel');


//Bouton partage
const button_partage = document.querySelector(".article-card a.article-partager");
if (button_partage !== null) {
    button_partage.addEventListener("click", ClickButtonPartage);
}

function ClickButtonPartage(e) {
    document.querySelector(".article-partager-liens").classList.toggle("show");
    e.preventDefault();
    e.stopPropagation();
}

//User boutton dropdown
const userButton = document.querySelector("header #userButton");
userButton.addEventListener("click", ClickUserButton);

function ClickUserButton() {
    if (window.matchMedia("(min-width: 768px)").matches) {
        document.querySelector("#userMenu").classList.toggle("showUserMenu");
    } else {
        window.location.href = "/caracara/public/user/profile";
    }
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
const DarkModeSwitchButton = document.querySelector(".fa-moon");
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
    if (localStorage.getItem('darkTheme') === "yes") {
        body.classList.replace("lightTheme", "darkTheme");
        logo.src = "/caracara/public/img/Logo-DarkMode.png"
    } else {
        body.classList.replace("darkTheme", "lightTheme");
        logo.src = "/caracara/public/img/Logo.png"
    }
}

(function () {
    if (localStorage.getItem('darkTheme') === "yes") {
        body.classList.replace("lightTheme", "darkTheme");
        logo.src = "/caracara/public/img/Logo-DarkMode.png"
    } else {
        body.classList.replace("darkTheme", "lightTheme");
        logo.src = "/caracara/public/img/Logo.png"
    }
}());


//Slide création de post
const lien = document.querySelector(".createTableau");
const lienRetour = document.querySelector(".retour_creationPost");

if (lien !== null) {
    lien.addEventListener("click", displaySideBarCreationTableau);
}
if (lienRetour !== null) {
    lienRetour.addEventListener("click", removeSideBarCreationTableau);
}

function displaySideBarCreationTableau(e) {
    e.preventDefault();
    document.querySelector(".sidebar").classList.add("showSideBar");
}

function removeSideBarCreationTableau(e) {
    e.preventDefault();
    document.querySelector(".sidebar").classList.remove("showSideBar");
}
