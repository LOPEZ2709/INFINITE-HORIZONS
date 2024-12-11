<?php
// Incluir el archivo de conexión
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php'); // Asegúrate de que este archivo exista y contenga la clase Database
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/servidor/categoria/categoriaDB.php'); // Asegúrate de que este archivo exista y contenga la clase CategoriaDB


// Crear una instancia de la clase Database
$database = new Database();
$dbConnection = $database->getConnection(); // Obtener la conexión

// Crear una instancia de la clase CategoriaDB, pasando la conexión
$categoriaDB = new CategoriaDB($dbConnection); // Asegúrate de que el nombre de la clase sea correcto

// Obtener las categorías
$categorias = $categoriaDB->obtenerCategorias();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Categorías</title>
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
                <li><a href="./../itinerario.html">
                    <i class="fas fa-calendar-alt"></i> 
                    <span class="nav-item">Itinerario</span>
                </a></li>
                <li><a href="./../planes.html">
                    <i class="fas fa-map-marked-alt"></i> 
                    <span class="nav-item">Planes De Viaje</span>
                </a></li>
                <li><a href="./../turismo.html">
                    <i class="fas fa-plane-departure"></i> 
                    <span class="nav-item">Turismo</span>
                </a></li>
                <li><a href="./../restaurantes/restaurantes.php">
                    <i class="fas fa-utensils"></i> 
                    <span class="nav-item">Restaurantes</span>
                </a></li>
                <li><a href="../hoteles/hoteles.html">
                    <i class="fas fa-hotel"></i> 
                    <span class="nav-item">Hotelería</span>
                </a></li>
                <li><a href="./../mensajes.html">
                    <i class="fas fa-envelope"></i>
                    <span class="nav-item">Mensajes</span>
                </a></li>
                <li><a href="./../comentarios.html">
                    <i class="fas fa-comments"></i>
                    <span class="nav-item">Comentarios</span>
                </a></li>
                <li><a href="./../notificaciones.html">
                    <i class="fas fa-bell"></i>
                    <span class="nav-item">Notificaciones</span>
                </a></li>
                <li><a href="./../ajustes.html">
                    <i class="fas fa-cogs"></i>
                    <span class="nav-item">Ajustes</span>
                </a></li>
            </ul>
        </nav>
        </div>

    <h1>Listado de Categorías</h1>

    <a href="insertar-categoria.php">Agregar Nueva Categoría</a><br><br>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?php echo $categoria['id_categoria']; ?></td>
                    <td><?php echo $categoria['nombre_cate']; ?></td>
                    <td><?php echo $categoria['desc_cate']; ?></td>
                    <td>
                        <a href="actualizar-categoria.php?id=<?php echo $categoria['id_categoria']; ?>">Actualizar</a> |
                        <a href="eliminar-categoria.php?id=<?php echo $categoria['id_categoria']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>