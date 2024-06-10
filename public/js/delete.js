// Defina a função no escopo global
function showConfirmationModal(title, message, action) {
    document.getElementById('modalTitle').innerText = title;
    document.getElementById('modalBody').innerText = message;

    var confirmButton = document.getElementById('confirmButton');
    confirmButton.onclick = action;

    var confirmationModal = document.getElementById('confirmationModal');
    confirmationModal.classList.remove('hidden');
}

// Função para esconder o modal
function hideConfirmationModal() {
    var confirmationModal = document.getElementById('confirmationModal');
    confirmationModal.classList.add('hidden');
}

document.addEventListener('DOMContentLoaded', function () {
    // Adiciona o evento de clique para fechar o modal
    var modalCloseButton = document.getElementById('modal-close');
    modalCloseButton.addEventListener('click', hideConfirmationModal);

    document.getElementById('cancelButton').addEventListener('click', hideConfirmationModal);
});
