<?php
include 'conectar.php';

$cod_proveeedor=$_POST['cod_proveeedor'];
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$pag_web=$_POST['pag_web'];
$valor_del_producto=$_POST['valor_del_producto'];
$id_adm=$_POST['id_adm'];



$respueta=mysqli_query($conexion,$insertar)
or die ("impocible nserar datos ");

mysqli_close($conexion);

echo"los datos de la tabla proveedor se insertaron correctamente "

Mysqli_query($conexion, "UPDATE proveedor SET nombre='$nombre',email='$email',telefono='$telefono',direccion='$direccion',pag_web='$pag_web',valor_del_producto='$valor_del_producto',id_adm='$id_adm' WHERE cod_proveedor='$cod_proveedor'")
 or die(" no se pueden actualizar");

 mysqli_close($conexion);

 echo " se actualizaron los datos correctamente";
?>