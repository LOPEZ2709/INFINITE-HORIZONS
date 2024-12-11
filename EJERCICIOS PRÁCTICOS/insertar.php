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
        $email=$_POST['email'];
            $telefono=$_POST['telefono'];
                $direccion=$_POST['direccion'];
                    $constrase=$_POST['contrase'];

                    $insertar="INSERT INTO administrador VALUES('$id_administrador','$nombre','$email','$telefono','$direccion','$constrase')"

                        $respuesta=mysqli_query($conexion,$insertar)
or die("imposible nserar datos");

mysqli_close($conexion);

echo"Los datos de la tabla administrador se insertaron con exito"

?>

        
</body>
</html>