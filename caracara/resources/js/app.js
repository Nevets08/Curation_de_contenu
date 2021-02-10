require('./bootstrap');

require('alpinejs');

require('slick-carousel');


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
    button_edit_profile.style.zIndex = "15";

    if (document.querySelector(".sidebar").classList.contains("showSideBar")) {
        button_edit_profile.innerHTML = "Retour au profil"
        button_edit_profile.style.position = "absolute";
        button_edit_profile.style.top = "0";
        button_edit_profile.style.right = "0";
    } else {
        button_edit_profile.innerHTML = "Modifier "
        button_edit_profile.style.position = "initial";
    }
}

const userButton = document.querySelector("header #userButton");
const icone_search = document.querySelector("header .fa-search");
const button_edit_profile = document.querySelector(".infos_button_edit");

userButton.addEventListener("click", ClickUserButton);
icone_search.addEventListener("click", ClickSearchIcone);
if (button_edit_profile !== null) {
    button_edit_profile.addEventListener("click", DisplaySideBar);
}


$(document).ready(function() {

    $('.tableaux_publics').slick({
        infinite: false,
        speed: 300,
        slidesToShow: 9,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                }
            }
        ]
    });

    $('.tableaux_suivi_slider, .tableaux_prives_slider').slick({
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                }
            }
        ]
    });


    $('.publications_sauvegardees_slider, .derniers_posts_slider').slick({
        infinite: false,
        speed: 300,
        slidesToShow: 1,
    });
});
