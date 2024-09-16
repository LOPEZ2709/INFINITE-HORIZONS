document.addEventListener('DOMContentLoaded', function() {
    const perfilimg = document.getElementById('perfil-img');
    const menuopciones = document.getElementById('menu-opciones');

    // Mostrar u ocultar el menú de opciones al hacer clic en la imagen de perfil
    perfilimg.addEventListener('click', function(event) {
        event.stopPropagation();
        if (menuopciones.style.display === 'block') {
            menuopciones.style.display = 'none';
        } else {
            menuopciones.style.display = 'block';
        }
    });

    // Ocultar el menú de opciones si se hace clic fuera de él
    document.addEventListener('click', function(event) {
        if (!perfilimg.contains(event.target) && !menuopciones.contains(event.target)) {
            menuopciones.style.display = 'none';
        }
    });
});