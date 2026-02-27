const modal = document.getElementById("editModal");
const closeBtn = document.querySelector(".modal .close");

document.querySelectorAll(".edit-btn").forEach(btn => {
    btn.addEventListener("click", () => {
        document.getElementById("modal-id").value = btn.dataset.id;
        document.getElementById("modal-titre").value = btn.dataset.titre;
        document.getElementById("modal-image").value = btn.dataset.image;
        document.getElementById("modal-descriptif").value = btn.dataset.descriptif;
        document.getElementById("modal-prix").value = btn.dataset.prix;
        modal.style.display = "block";
    });
});

closeBtn.addEventListener("click", () => modal.style.display = "none");
window.addEventListener("click", e => { if(e.target === modal) modal.style.display = "none"; });