<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="estilos.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif&display=swap" rel="stylesheet">
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p> Administardor Actualizar </p>
<form action="actualizar.php" method="POST">
<ul>
    <li>
    <label for="id_adm">id_admistrador </label><br>
    <input type="text"name ="id_adm"><br>
    </li>

        <li>
        <label for="nombre">nombre </label><br>
        <input type="text"name ="nombre"><br>
</li>


<li>
            <label for="email">email </label><br>
            <input type="text"name ="email"><br>
            </li> 


                <li>
                <label for="telefono ">telefono </label><br>
                <input type="text"name ="telefono"><br>
                </li>

                    <li>
                    <label for="direccion ">direccion </label><br>
                    <input type="text"name ="direccion"><br>
                    </li>
                    
                    
            <li>
            <label for="contrase">contrase</label><br>
            <input type="text"name ="contrase"><br>
            </li>

            
<input type="submit"name ="insertar" value="insertar">


</ul>
</form>
</body>
</html>