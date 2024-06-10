// Função para mostrar o modal com título e descrição da tarefa
function showModal(title, description) {
    document.getElementById('modalTitle').innerText = title;
    document.getElementById('modalBody').innerText = description;

    var confirmationModal = document.getElementById('default-modal');
    confirmationModal.classList.remove('hidden');
}

document.addEventListener('DOMContentLoaded', function () {
    // Adiciona o evento de clique para fechar o modal
    var modalCloseButtons = document.querySelectorAll('[data-modal-hide]');
    modalCloseButtons.forEach(function (button) {
        button.addEventListener('click', hideModal);
    });
});

// Função para esconder o modal
function hideModal() {
    var confirmationModal = document.getElementById('default-modal');
    confirmationModal.classList.add('hidden');
}

