// main.js

function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginRight = "250px";
    document.getElementById("openbtn").style.visibility = "hidden";
}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginRight = "0";
    document.getElementById("openbtn").style.visibility = "visible";
}

function logout() {
    window.location.href = 'PHP/logout.php';
}

function showAddPetForm() {
    var addPetForm = document.getElementById("addPetForm");
    addPetForm.style.display = "block";
}

function closeAddPetForm() {
    var addPetForm = document.getElementById("addPetForm");
    addPetForm.style.display = "none";
}

let petIdToDelete = null;

function openDeleteModal(petId) {
    petIdToDelete = petId;
    var modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal' + petId), {
        keyboard: false
    });
    modal.show();
}

function closeDeleteModal(petId) {
    var modal = bootstrap.Modal.getInstance(document.getElementById('confirmDeleteModal' + petId));
    modal.hide();
}

function openEditModal(petId) {
    var modal = new bootstrap.Modal(document.getElementById('editPetModal' + petId), {
        keyboard: false
    });
    modal.show();
}

function closeEditModal(petId) {
    var modal = bootstrap.Modal.getInstance(document.getElementById('editPetModal' + petId));
    modal.hide();
}
