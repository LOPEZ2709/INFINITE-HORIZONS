<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p> insertar a la base de datos <p>
        <?php
include 'conectar.php';

$id_administrador=$_POST['id_administrador'];
    $nombre=$_POST['nombre'];
        $telefono=$_POST['telefono'];
            $direccion=$_POST['direccion'];
                $edad=$_POST['edad'];
                    $id_adm=$_POST['id_adm'];

                    $insertar="INSERT INTO cliente VALUES('$id_cliente','$nombre','$telefono','$direccion','$edad','$id_adm')"

                        $respuesta=mysqli_query($conexion,$insertar)
or die("imposible nserar datos");

mysqli_close($conexion);

echo"Los datos de la tabla cliente se insertaron con exito"

?>

        
</body>
</html>