document.addEventListener('DOMContentLoaded', function () {
    // Encontrar o elemento de alerta de sucesso
    const successAlert = document.getElementById('successAlert');

    // Se o elemento de alerta existir
    if (successAlert) {
        // Definir um temporizador para ocultar o elemento após 5 segundos (5000 milissegundos)
        setTimeout(function () {
            successAlert.style.display = 'none';
        }, 5000); // 5000 milissegundos = 5 segundos
    }
});