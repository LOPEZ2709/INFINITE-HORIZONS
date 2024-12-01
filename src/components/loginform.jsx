import React from "react";
import Swal from "sweetalert2";

const LoginForm = () => {
    const handleLoginSubmit = (event) => {
        event.preventDefault();
        const email = event.target.email.value;
        const password = event.target.password.value;

        if (!email || !password) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Por favor ingrese el correo y la contraseña.",
            });
            return;
        }

        const formData = new FormData();
        formData.append("email", email);
        formData.append("password", password);

        fetch("login.php", {
            method: "POST",
            body: formData,
        })
        .then((response) => response.json())
        .then((result) => {
            if (result.success) {
                Swal.fire({
                    title: "¡Éxito!",
                    text: "Inicio de sesión exitoso.",
                    icon: "success",
                }).then(() => {
                    window.location.href = "dashboard.php";
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: result.message,
                });
            }
        })
        .catch((error) => console.error("Error:", error));
    };

    return (
        <form className="form form-login" onSubmit={handleLoginSubmit}>
            <h2>INICIAR SESION</h2>
            <div className="social-networks">
                {/* Puedes agregar los iconos de redes sociales aquí */}
            </div>
            <span>Use su correo y contraseña</span>
            <div className="container-input">
                <input type="email" name="email" placeholder="Gmail" required />
            </div>
            <div className="container-input">
                <input type="password" name="password" placeholder="Contraseña" required />
            </div>
            <a href="restored.html">Olvidaste tu contraseña?</a>
            <a href="../Loginempresa/inicio.html">Soy una empresa</a>
            <button className="button">Iniciar Sesión</button>
        </form>
    );
};

export default LoginForm;
