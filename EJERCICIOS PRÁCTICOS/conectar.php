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
$usuario= "root";
$contraseña="";
$base_de_datos="pagina_web";


$conexion= mysqli_connect($servidor,$usuario,$contraseña,$base_de_datos)
or die("imposible conectar");

if(!$conexion)
{

    echo"imposible conectar".mysqli_connect_error();

}
   



?>
</body>
</html>