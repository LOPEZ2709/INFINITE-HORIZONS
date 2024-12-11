<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/servidor/persona/personaDB.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');

$db = new Database();
$conexion = $db->getConnection();
$personaDB = new PersonaDB($conexion);

$personas = $personaDB->obtenerPersonas();
?>
<link rel="stylesheet" href="persona.css">
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

<h2>Lista de Personas</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($personas as $persona): ?>
        <tr>
            <td><?php echo $persona['id_persona']; ?></td>
            <td><?php echo $persona['nombre_usu']; ?></td>
            <td><?php echo $persona['apellido_usu']; ?></td>
            <td><?php echo $persona['email_usu']; ?></td>
            <td><?php echo $persona['telefono_usu']; ?></td>
            <td>
                <a href="actualizar-persona.php?id=<?php echo $persona['id_persona']; ?>">Actualizar</a>
                <a href="eliminar-persona.php?id=<?php echo $persona['id_persona']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="insertar-persona.php">Agregar Nueva Persona</a>