<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/servidor/estado/estadoDB.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');
$db = new Database();
$conexion = $db->getConnection();
$estadoDB = new EstadoDB($conexion );

$estados = $estadoDB->obtenerEstados();
?>
<link rel="stylesheet" href="estado.css">
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

<h2>Lista de Estados</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($estados as $estado): ?>
        <tr>
            <td><?php echo $estado['id_estado']; ?></td>
            <td><?php echo $estado['desc_estado']; ?></td>
            <td>
                <a href="actualizar-estado.php?id=<?php echo $estado['id_estado']; ?>">Actualizar</a>
                <a href="eliminar-estado.php?id=<?php echo $estado['id_estado']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="insertar-estado.php">Agregar Nuevo Estado</a>