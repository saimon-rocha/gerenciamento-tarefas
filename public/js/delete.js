function showConfirmationModal(title, message, action) {
    document.getElementById('modalTitle').innerText = title;
    document.getElementById('modalBody').innerText = message;
    var confirmButton = document.getElementById('confirmButton');
    confirmButton.removeEventListener('click', confirmButton.onclick); // Remove qualquer evento de clique existente
    confirmButton.addEventListener('click', action); // Adiciona o novo evento de clique
    var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
    confirmationModal.show();
}