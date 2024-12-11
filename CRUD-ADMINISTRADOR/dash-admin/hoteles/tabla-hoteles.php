<?php
// Incluir el archivo de configuración
require_once '../../../conexion.php'; // Asegúrate de que la ruta sea correcta

// Consulta de hoteles
$query = "SELECT id_hoteles, titulo_hotel, img, desc_hotel, fecha_inicio, fecha_fin, id_estado, id_empresa, id_calificacion FROM hoteles"; 
$result = $conexion->query($query);

?>
<table id="tabla-hoteles"> 
    <tr> 
        <th>ID Hotel</th> 
        <th>Título</th> 
        <th>Descripción</th> 
        <th>Fecha Inicio</th> 
        <th>Fecha Fin</th> 
        <th>Estado</th> 
        <th>Empresa</th> 
        <th>Calificación</th> 
        <th>Actualizar</th> 
        <th>Eliminar</th> 
    </tr> 
    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?> <!-- Cambia fetch_assoc() por fetch(PDO::FETCH_ASSOC) -->
    <tr> 
        <td><?php echo htmlspecialchars($row['id_hoteles']); ?></td> 
        <td><?php echo htmlspecialchars($row['titulo_hotel']); ?></td> 
        <td><?php echo htmlspecialchars($row['desc_hotel']); ?></td> 
        <td><?php echo htmlspecialchars($row['fecha_inicio']); ?></td> 
        <td><?php echo htmlspecialchars($row['fecha_fin']); ?></td> 
        <td>
            <?php 
                $estado_sql = "SELECT desc_estado FROM estado WHERE id_estado = " . $row['id_estado'];
                $estado_result = $conexion->query($estado_sql);
                $estado_row = $estado_result->fetch(PDO::FETCH_ASSOC); 
                echo htmlspecialchars($estado_row['desc_estado']);
            ?>
        </td>
        <td>
            <?php 
                $empresa_sql = "SELECT nombre_emp FROM empresa WHERE id_empresa = " . $row['id_empresa'];
                $empresa_result = $conexion->query($empresa_sql);
                $empresa_row = $empresa_result->fetch(PDO::FETCH_ASSOC); 
                echo htmlspecialchars($empresa_row['nombre_emp']);
            ?>
        </td>
        <td>
            <?php 
                $calificacion_sql = "SELECT puntuacion FROM calificacion WHERE id_calificacion = " . $row['id_calificacion'];
                $calificacion_result = $conexion->query($calificacion_sql);
                $calificacion_row = $calificacion_result->fetch(PDO::FETCH_ASSOC); 
                echo htmlspecialchars($calificacion_row['puntuacion']);
            ?>
        </td>
        <td>
            <a href="formulario-actualizar-hotel.php?id_hoteles=<?php echo $row['id_hoteles']; ?>" class="btn btn-primary">
                <i class="fas fa-edit"></i> Actualizar
            </a>
        </td>
        <td>
            <a href="eliminar-hoteles.php?id_hoteles=<?php echo $row['id_hoteles']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este hotel?');">
                <i class="fas fa-trash"></i> Eliminar
            </a>
        </td>
    </tr> 
    <?php } ?> 
</table> 

<script> 
function eliminar(id) { 
    Swal.fire({ 
        title: '¿Está seguro?', 
        text: "¿Desea eliminar el registro?", 
        icon: 'warning', 
        showCancelButton: true, 
        confirmButtonText: 'Sí, eliminar!', 
        cancelButtonText: 'Cancelar' 
    }).then((result) => { 
        if (result.isConfirmed) {
            fetch(`eliminar-hoteles.php?id_hotel=${id}`) 
                .then(response => response.json()) 
                .then(data => { 
                    if (data.status === 'success') { 
                        Swal.fire('Eliminado!', 'El hotel ha sido eliminado.', 'success'); 
                        location.reload(); 
                    } else { 
                        Swal.fire('Error', 'No se pudo eliminar el hotel.', 'error'); 
                    } 
                }); 
        } 
    }); 
} 
</script> 
