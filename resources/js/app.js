require("./bootstrap");

require("alpinejs");

const membersButton = document.querySelector("aside .members button");
const modal = document.querySelector(".background-modal");

membersButton.addEventListener("click", () => {
    modal.classList.add("active-modal");
    modal.classList.remove("inactive-modal");
});

const closeModal = document.getElementById("close-modal-button");

closeModal.addEventListener("click", () => {
    modal.classList.remove("active-modal");
    modal.classList.add("inactive-modal");
});
