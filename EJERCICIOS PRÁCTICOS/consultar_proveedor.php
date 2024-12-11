<?php
include 'conectar.php';
$consultar= mysqli_query($conexion, "SELECT*FROM administrador ")

or die("error al consultar la tabla");

echo'<table border"3">';
    echo'<tr>';
        echo'<th "cod_proveedor "> cod_proveedor </th>';
            echo'<th "nombre"> nombre </th>';
                echo'<th "email"> email </th>';
                    echo'<th "telefono"> telefono </th>';
                        echo'<th "direccion"> direccion </th>';
                            echo'<th "pag_web"> pag_web </th>';
                                echo'<th "valor_del_producto"> valor_del_producto</th>';
                                   echo'<th "id_adm"> id_adm </th>';



while($consultar=mysqli_fetch_array($consulta))


{

echo'<tr>';
    echo'<th>'.$consultar['cod_proveedor '].'</th>';
        echo'<th>'.$consultar['nombre'].'</th>';
            echo'<th>'.$consultar['email'].'</th>';
                echo'<th>'.$consultar['telefono'].'</th>';
                    echo'<th>'.$consultar['direccion'].'</th>';
                        echo'<th>'.$consultar['pag_web'].'</th>';
                            echo'<th>'.$consultar['valor_del_producto'].'</th>';
                                  echo'<th>'.$consultar['id_adm'].'</th>';



}


mysqli_close($conexion);
echo'</table>';

?>