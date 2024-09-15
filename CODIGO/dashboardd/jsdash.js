// Obtenemos todos los enlaces del sidebar
const links = document.querySelectorAll('nav.sidebar ul li a');
const mainContent = document.querySelector('.main');

// Escuchamos el evento de clic para cada enlace
links.forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault(); // Prevenimos que se recargue la página

        // Obtenemos el contenido dinámico correspondiente
        const contentType = this.getAttribute('data-content');
        loadContent(contentType);
    });
});

// Función para cargar el contenido dinámico
function loadContent(type) {
    let contentHTML = '';

    switch(type) {
        case 'home':
            // El contenido por defecto (Inicio) es lo que ya está en la página
            contentHTML = `
                <div class="main-top">
                    <h1>Infinite Horizone</h1>
                    <i class="fas fa-user-cog"></i>
                </div>
                <div class="main-skills">
                    <div class="card">
                        <i class="fas fa-laptop-code"></i>
                        <h3>Itinerario</h3>
                        <p>Crea y revisa tus itinerarios.</p>
                        <button class="btn-ingresar">Ingresar</button>
                    </div>
                    <div class="card">
                        <i class="fab fa-wordpress"></i>
                        <h3>Reservas</h3>
                        <p>Aquí puedes ver los estados de las reservas.</p>
                        <button class="btn-ingresar">Ingresar</button>
                    </div>
                    <div class="card">
                        <i class="fas fa-palette"></i>
                        <h3>Recomendaciones</h3>
                        <p>xxxxx-xxxxx--xxxxxxx.</p>
                        <button class="btn-ingresar">Ingresar</button>
                    </div>
                    <div class="card">
                        <i class="fab fa-app-store-ios"></i>
                        <h3>Ver planes</h3>
                        <p>Crea tus planes de viaje.</p>
                        <button class="btn-ingresar">Ingresar</button>
                    </div>
                </div>
                <section class="main-course">
                    <h1>Eventos recomendados</h1>
                    <div class="course-box">
                        <div class="card-container">
                            <div class="card">
                                <img src="img/hotel2.jpg" alt="Hotelería" class="card-img">
                                <div class="card-body">
                                    <h3>Hotelería</h3>
                                    <p>Ofrecemos una selección de hoteles y alojamientos que se adaptan a todos los presupuestos y preferencias.</p>
                                    <a href="#" class="btn-leer-mas">Leer Más</a>
                                </div>
                            </div>
                            <div class="card">
                                <img src="img/comida.jpg" alt="Restaurantes" class="card-img">
                                <div class="card-body">
                                    <h3>Restaurantes</h3>
                                    <p>Disfruta de la exquisita gastronomía bogotana en nuestros restaurantes recomendados.</p>
                                    <a href="#" class="btn-leer-mas">Leer Más</a>
                                </div>
                            </div>
                            <div class="card">
                                <img src="img/monserrate222.jpg" alt="Turismo" class="card-img">
                                <div class="card-body">
                                    <h3>Turismo</h3>
                                    <p>Visita los principales atractivos turísticos de Bogotá.</p>
                                    <a href="#" class="btn-leer-mas">Leer Más</a>
                                </div>
                            </div>
                            <div class="card">
                                <img src="img/plan.jpg" alt="Crea tu propio plan" class="card-img">
                                <div class="card-body">
                                    <h3>Crea tu propio plan</h3>
                                    <p>Personaliza tu viaje con nuestro servicio de planificación.</p>
                                    <a href="#" class="btn-leer-mas">Leer Más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            `;
            break;
        case 'listas':
            contentHTML = `<h2>Listas</h2><p>Aquí puedes gestionar tus listas.</p>`;
            break;
        case 'notificaciones':
            contentHTML = `<h2>Notificaciones</h2><p>Aquí verás tus notificaciones.</p>`;
            break;
        case 'mensajes':
            contentHTML = `<h2>Mensajes</h2><p>Aquí puedes ver tus mensajes.</p>`;
            break;
        case 'comentarios':
            contentHTML = `<h2>Comentarios</h2><p>Aquí puedes leer y gestionar tus comentarios.</p>`;
            break;
        case 'mas-opciones':
            contentHTML = `<h2>Más opciones</h2><p>Aquí puedes configurar opciones avanzadas.</p>`;
            break;
        case 'ajustes':
            contentHTML = `<h2>Ajustes</h2><p>Configura los ajustes del sistema aquí.</p>`;
            break;
        default:
            contentHTML = `<h2>Bienvenido al dashboard</h2><p>Selecciona una opción del menú para ver su contenido.</p>`;
            break;
    }

    // Reemplazamos el contenido del área principal con el nuevo contenido
    mainContent.innerHTML = contentHTML;

    // Agregar manejadores de eventos a los nuevos botones de "Ingresar" y "Leer Más"
    addEventListenersToCards();
}

// Función para agregar funcionalidad a los botones "Ingresar" y "Leer Más"
function addEventListenersToCards() {
    const ingresarButtons = document.querySelectorAll('.btn-ingresar');
    const leerMasButtons = document.querySelectorAll('.btn-leer-mas');

    // Agregamos funcionalidad a los botones "Ingresar"
    ingresarButtons.forEach(button => {
        button.addEventListener('click', () => {
            alert('Ingresar a la sección seleccionada');
            // Aquí puedes redirigir a otra página o cargar contenido
        });
    });

    // Agregamos funcionalidad a los botones "Leer Más"
    leerMasButtons.forEach(button => {
        button.addEventListener('click', () => {
            alert('Leer más sobre este evento');
            // Aquí puedes redirigir a otra página con más información
        });
    });
}
