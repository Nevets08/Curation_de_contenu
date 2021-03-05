require('./bootstrap');

require('alpinejs');

require('slick-carousel');


new Vue({
    el: "#app",
    data: function() {
        return {
            darkTheme: false
        }
    },
    methods: {
        toggleTheme: function() {
            this.darkTheme = !this.darkTheme;
        }
    }
});

const userButton = document.querySelector("header #userButton");
const icone_search = document.querySelector("header .fa-search");
const button_edit_profile = document.querySelector(".infos_button_edit");
const button_partage = document.querySelector(".article-card .article-partager");
const button_tableau_options = document.querySelector(".title i");


userButton.addEventListener("click", ClickUserButton);
icone_search.addEventListener("click", ClickSearchIcone);
if (button_edit_profile !== null) {
    button_edit_profile.addEventListener("click", DisplaySideBar);
}
if (button_partage !== null) {
    button_partage.addEventListener("click", ClickButtonPartage);
}
if (button_tableau_options !== null) {
    button_tableau_options.addEventListener("click", DisplaySideBar);
}

function ClickButtonPartage() {
    document.querySelector(".article-partager-liens").classList.toggle("show");
}

function ClickUserButton() {
    if (window.matchMedia("(min-width: 768px)").matches) {
        document.querySelector("#userMenu").classList.toggle("showUserMenu");
    } else {
        window.location.href = "/caracara/public/user/profile";
    }
}

function ClickSearchIcone() {
    document.querySelector("#search-form").classList.toggle("showSearchBar");
}

function DisplaySideBar() {
    document.querySelector(".sidebar").classList.toggle("showSideBar");
    this.style.zIndex = "15";

    if (document.querySelector(".sidebar").classList.contains("showSideBar") && document.body.classList.contains("profil")) {
        console.log("click sur button sur page profil");
        button_edit_profile.innerHTML = "Retour au profil"
        button_edit_profile.style.position = "absolute";
        button_edit_profile.style.top = "0";
        button_edit_profile.style.right = "0";
    } else if (document.body.classList.contains("profil")) {
        button_edit_profile.innerHTML = "Modifier "
        button_edit_profile.style.position = "initial";
    }

    if (document.querySelector(".sidebar").classList.contains("showSideBar") && document.body.classList.contains("tableau")) {
        console.log("click sur button sur page tableau");
        button_tableau_options.classList.replace("fa-sliders-h", "fa-arrow-left");
        button_tableau_options.style.position = "absolute";
        button_tableau_options.style.top = "16px";
        button_tableau_options.style.left = "0";
        button_tableau_options.style.fontSize = "font-size: 3rem;";
    } else if (document.body.classList.contains("tableau")){
        button_tableau_options.classList.replace("fa-arrow-left", "fa-sliders-h");
        button_tableau_options.style.position = "initial";
        button_tableau_options.style.fontSize = "font-size: xx-large;";
    }
}
