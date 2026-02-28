document.addEventListener("DOMContentLoaded", () => {

    const productViewModal = document.getElementById("product-view-modal");
    const modalCard = document.querySelector(".product-view-modal__card");
    const productViewClose = document.querySelector(".product-view-modal__close");

    const productViewImage = document.getElementById("product-view-image");
    const productViewTitle = document.getElementById("product-view-title");
    const productViewDescription = document.getElementById("product-view-description");
    const productViewPrice = document.getElementById("product-view-price");

    const productViewAddBtn = document.getElementById("product-view-add-btn");
    const productViewFeedback = document.getElementById("product-view-feedback");

    const clickableImages = document.querySelectorAll(".js-open-product-modal");

    /* ===== OUVERTURE DE LA MODAL ===== */
    clickableImages.forEach(img => {
        img.addEventListener("click", (e) => {
            e.stopPropagation(); // empêche la fermeture immédiate
            productViewModal.style.display = "flex";

            productViewImage.src = img.dataset.image;
            productViewTitle.textContent = img.dataset.title;
            productViewDescription.textContent = img.dataset.description;
            productViewPrice.textContent = img.dataset.price + " €";

            productViewFeedback.style.display = "none";
        });
    });

    /* ===== FERMETURE AVEC LA CROIX ===== */
    productViewClose.addEventListener("click", () => {
        productViewModal.style.display = "none";
    });

    /* ===== FERMETURE SI CLIC EN DEHORS DE LA CARTE ===== */
    productViewModal.addEventListener("click", (e) => {
        if (!modalCard.contains(e.target)) {
            productViewModal.style.display = "none";
        }
    });

    /* ===== BOUTON PANIER DEMO ===== */
    productViewAddBtn.addEventListener("click", (e) => {
        e.stopPropagation();
        productViewFeedback.style.display = "block";

        setTimeout(() => {
            productViewFeedback.style.display = "none";
        }, 2000);
    });

    /* ===== FERMETURE AVEC ESC ===== */
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            productViewModal.style.display = "none";
        }
    });

});