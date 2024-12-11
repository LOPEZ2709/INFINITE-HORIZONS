<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../restaurantes/restaurantes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>
<body>
<div class="container">
    <nav class="barra-lateral">
        <ul>
            <li><a href="../../1.html" class="logo">
                <img src="../img/Logo1.png" alt="">
                <span class="nav-item">Infinite Horizons</span>
            </a></li>
            <li><a href="../../1.html">
                <i class="fas fa-home"></i>
                <span class="nav-item">Inicio</span>
            </a></li>
            <li><a href="./../calificacion/calificacion.php">
                <i class="fas fa-star"></i> 
                <span class="nav-item">Calificación</span>
            </a></li>
            <li><a href="./../categoria/categoria.php">
                <i class="fas fa-tags"></i> 
                <span class="nav-item">Categoría</span>
            </a></li>
            <li><a href="./../empresa/empresa.php">
                <i class="fas fa-building"></i> 
                <span class="nav-item">Empresa</span>
            </a></li>
            <li><a href="./../estado/estado.php">
                <i class="fas fa-flag"></i> 
                <span class="nav-item">Estado</span>
            </a></li>
            <li><a href="./../hoteles/hoteles.php">
                <i class="fas fa-hotel"></i> 
                <span class="nav-item">Hoteles</span>
            </a></li>
            <li><a href="./../persona/persona.php">
                <i class="fas fa-user"></i> 
                <span class="nav-item">Persona</span>
            </a></li>
            <li><a href="./../persona_reserva/persona_reserva.php">
                <i class="fas fa-id-badge"></i> 
                <span class="nav-item">Persona Reserva</span>
            </a></li>
            <li><a href="./../reserva/reserva.php">
                <i class="fas fa-calendar-check"></i> 
                <span class="nav-item">Reserva</span>
            </a></li>
            <li><a href="./../restaurantes/restaurantes.php">
                <i class="fas fa-utensils"></i> 
                <span class="nav-item">Restaurantes</span>
            </a></li>
            <li><a href="./../rol/rol.php">
                <i class="fas fa-users-cog"></i> 
                <span class="nav-item">Rol</span>
            </a></li>
            <li><a href="./../seguridad/seguridad.php">
                <i class="fas fa-shield-alt"></i> 
                <span class="nav-item">Seguridad</span>
            </a></li>
            <li><a href="./../sitio_turistico/sitio_turistico.php">
                <i class="fas fa-map-marked-alt"></i> 
                <span class="nav-item">Sitio Turístico</span>
            </a></li>
        </ul>
    </nav>
</div>


    <h1>Hoteles</h1>  
    <hr>
    <form id="miFormulario" method="POST" enctype="multipart/form-data">
        <label for="titulo_hotel">Título del Hotel:</label>
        <input type="text" id="titulo_hotel" name="titulo_hotel" required>

        <label for="img">Imagen del Hotel:</label>
        <input type="file" id="img" name="img" accept="image/*" required>

        <label for="desc_hotel">Descripción del Hotel:</label>
        <input type="text" id="desc_hotel" name="desc_hotel" required>

        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" required>

        <label for="fecha_fin">Fecha de Fin:</label>
        <input type="date" id="fecha_fin" name="fecha_fin" required>

        <label for="id_estado">Estado:</label>
        <select id="id_estado" name="id_estado" required>
            <option value="">Seleccione...</option>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>

        <label for="id_empresa">ID de Empresa:</label>
        <input type="text" id="id_empresa" name="id_empresa" required>

        <label for="calificacion_id_calificacion">ID de Calificación:</label>
        <input type="text" id="id_calificacion" name="id_calificacion" required>

        <button type="submit">Enviar</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('miFormulario').onsubmit = function(event) {
            event.preventDefault(); // Prevenir el envío del formulario

            // Mostrar alerta de confirmación
            Swal.fire({
                title: '¿Los datos son correctos?',
                text: "¿Deseas enviar los datos del hotel?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, enviar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, proceder con el envío del formulario
                    const formData = new FormData(this);
                    fetch('insertar-hoteles.php', { // Aquí va el archivo PHP para insertar los hoteles
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire({
                                title: 'Ingreso Exitoso',
                                text: data.message,
                                icon: 'success',
                                timer: 10000,
                                timerProgressBar: true
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Error', data.message, 'error');
                        }
                    })
                    .catch(error => {
                        Swal.fire('Error', 'Ocurrió un error en la solicitud.', 'error');
                    });
                }
            });
        };
    </script>

    <?php include 'tabla-hoteles.php'; ?>

    <div class="text-left" style="margin-left: 100px;">
        <a href="reporte.php" class="btn btn-warning">Reporte</a>
    </div>

    <div class="contenedor-perfil">
        <img src="../img/4906519.png" alt="perfil" class="perfil-img" id="perfil-img">
        <div class="menu-opciones" id="menu-opciones">
            <a href="../../index.html">Cerrar Sesión</a>
        </div>
    </div>
</div>
</body>
</html>
