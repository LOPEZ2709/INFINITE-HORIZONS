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
<p> Cliente </p>
<form action="insertar.php" method="POST">
<ul>
    <li>
    <label for="id_cliente">id_cliente</label><br>
    <input type="text"name ="id_cliente"><br>
    </li>

        <li>
        <label for="nombre">nombre </label><br>
        <input type="text"name ="nombre"><br>
</li>


<li>
            <label for="telefeno">telefono </label><br>
            <input type="text"name ="telefono"><br>
            </li> 


                <li>
                <label for="direccion">direccion </label><br>
                <input type="text"name ="direccion"><br>
                </li>

                    <li>
                    <label for="edad ">edad </label><br>
                    <input type="text"name ="edad"><br>
                    </li>
                    
                    
            <li>
            <label for="id_adm">id_adm</label><br>
            <input type="text"name ="id_adm"><br>
            </li>

            
<input type="submit"name ="insertar" value="insertar">


</ul>
</form>

<hr>
<form action="consultar_cliente.php" method="POST">

<input type="submit" name="consultar"value="consultar">
</form>

<hr>

<form action="eliminar.php" method="POST">

<imput type="submit" name="eliminar">
</form>


<form id="formulario">
    <label for="id_cliente">id_Cliente:</label>
    <imput type="text" id="id_administrador "required>


        <label for="nombre"> Nombre:</label>
           <imput type="text" id="nombre "required>


              <label for="email"> Email:</label>
                  <imput type="email" id="email "required>
       

                    <label for="telefono"> Numero de Teléfono:</label>
                      <imput type="tel" id="telefeno"required>

                        <label for="direccion"> Direccion:</label>
                          <imput type="direccion" id="direccion"required>

                                <label for="edad"> Edada:</label>
                                    <imput type="edad" id="edad"required>

                                <label for="id_adm">id_Adm:</label>
                                  <imput type="text" id="id_Adm "required>

                              <button type="submit">Enviar</button>

</body>
</html>