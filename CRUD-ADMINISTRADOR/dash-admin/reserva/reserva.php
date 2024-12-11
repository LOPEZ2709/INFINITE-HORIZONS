<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');
$database = new Database();
$conexion = $database->getConnection();

class ReservaDB {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerReservas() {
        $sql = "SELECT * FROM reserva";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$reservaDB = new ReservaDB($conexion);
$reservas = $reservaDB->obtenerReservas();
?>

<link rel="stylesheet" href="reserva.css">
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
<!-- Mostrar reservas con botones de actualización y eliminación -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th>Descripción</th>
            <th>Método de Pago</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservas as $reserva): ?>
            <tr>
                <td><?php echo $reserva['id_reserva']; ?></td>
                <td><?php echo $reserva['estado_res']; ?></td>
                <td><?php echo $reserva['fecha_res']; ?></td>
                <td><?php echo $reserva['desc_res']; ?></td>
                <td><?php echo $reserva['metodo_pago']; ?></td>
                <td>
                    <a href="actualizar-reserva.php?id_reserva=<?php echo $reserva['id_reserva']; ?>">Actualizar</a>
                    <a href="eliminar-reserva.php?id_reserva=<?php echo $reserva['id_reserva']; ?>" onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
