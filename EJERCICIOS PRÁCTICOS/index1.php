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
<p> Administardor </P>
<form action="insertar.php" method="POST">
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

<hr>
<form action="consultar_administrador.php" method="POST">

<input type="submit" name="consultar"value="consultar">
</form>

<hr>

<form action="eliminar.php" method="POST">

<imput type="submit" name="eliminar">
</form>


<form id="formulario">
    <label for="id_administrador">id_Administrador:</label>
    <imput type="text" id="id_administrador "required>


        <label for="nombre"> Nombre:</label>
           <imput type="text" id="nombre "required>


              <label for="email"> Email:</label>
                  <imput type="email" id="email "required>
       

                    <label for="telefono"> Numero de Teléfono:</label>
                      <imput type="tel" id="telefeno"required>

                        <label for="confirm-contrase"> Confirmar Contrase</label>
                          <imput type="contrase" id="confirm-contrase"required>

                              <button type="submit">Enviar</button>


document.addEventListener('DOMContentLoaded', function() {
// Obtenemos una referencia al formulario
var formulario = document.getElementById('formulario');

// Agregamos un event listener para el evento submit
formulario.addEventListener('submit', function(event) {


// Detenemos el envío del formulario
event.preventDefault();

// Validamos cada campo individualmente
var id_Administrador = document.getElementById('id_Administrador').value;
var nombre = document.getElementById('nombre').value;
var apellido = document.getElementById('apellido').value;
var email = document.getElementById('email').value;
var telefono = document.getElementById('telefono').value;
var password = document.getElementById('password').value;
var confirmPassword = document.getElementById('confirm-password').value;
var codigoPostal = document.getElementById('codigo-postal').value;

// Validamos el campo Nombre
if (nombre === ") {
alert('Por favor, ingresa tu nombre.');
return;
}

// Validamos el campo Apellido
if (apellido === ") {
alert('Por favor, ingresa tu apellido.');
return;
}

// Validamos el campo Correo Electrónico



if (email === ") {
alert('Por favor, ingresa tu correo electrónico.');
return;
}

// Validamos el campo Número de Teléfono
if (telefono === ") {
alert('Por favor, ingresa tu número de teléfono.');
return;
}

// Validamos el campo Contraseña
if (password === ") {
alert('Por favor, ingresa una contraseña.'');
return;
}

// Validamos el campo Confirmar Contraseña
if (confirmPassword === "") {
alert('Por favor, confirma tu contraseña.'');
return;
}

// Validamos que las contraseñas coincidan
if (password !== confirmPassword) {



alert('Las contraseñas no coinciden. Por favor, inténtalo de nuevo.');
return;
}



// Si todos los campos son válidos, se puede enviar el formulario
alert('¡Formulario enviado correctamente!');
formulario.reset();
});
});   
 

       

</body>
</html>