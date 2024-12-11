<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $servidor="localhost";
    $usuario="root";
    $contraseña="";
    $base_datos="pagina_web";

    $conexion= mysqli_connect($servidor, $usuario, $contraseña, $base_datos) or die
    ("error al conectar con el servidor");

    $id_administardor = $_POST['id_administardor'];
    mysqli_query($conexion, "DELETE from administrador WHERE id_administardor='$id_administardor'")

    or die("error al eliminar los datos");
    mysqli_close($conexion);
    

    echo"datos eliminados de forma santisfactoria";

    ?>
</body>
</html>