<?php
include 'conectar.php';

$id_adm=$_POST['id_adm'];
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$contrase=$_POST['contrase'];



$respueta=mysqli_query($conexion,$insertar)
or die ("impocible nserar datos ");

mysqli_close($conexion);

echo"los datos de la tabla administrador se insertaron correctamente "

Mysqli_query($conexion, "UPDATE administrador SET nombre='$nombre',email='$email',telefono='$telefono',direccion='$direccion',contrase='$contrase' WHERE id_adm='$id_adm'")
 or die(" no se pueden actualizar");

 mysqli_close($conexion);

 echo " se actualizaron los datos correctamente";
?>