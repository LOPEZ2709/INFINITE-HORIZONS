import React from "react";
import Swal from "sweetalert2";

const LoginForm = () => {
    const handleLoginSubmit = (event) => {
        event.preventDefault();
        const email = event.target.email.value.trim();
        const password = event.target.password.value.trim();

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

        fetch("http://localhost/login.php", {
            method: "POST",
            body: formData,
        })
        .then((response) => {
            if (!response.ok) throw new Error("Error en la solicitud al servidor.");
            return response.json();
        })
        .then((result) => {
            if (result.success) {
                Swal.fire({
                    title: "¡Éxito!",
                    text: "Inicio de sesión exitoso.",
                    icon: "success",
                }).then(() => {
                    window.location.href = "/dashboard";
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: result.message || "Credenciales incorrectas.",
                });
            }
        })
        .catch((error) => {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "No se pudo conectar al servidor.",
            });
            console.error("Error:", error);
        });
    };

    return (
        <form className="form form-login" onSubmit={handleLoginSubmit}>
            <h2>INICIAR SESIÓN</h2>
            <span>Use su correo y contraseña</span>
            <div className="container-input">
                <input type="email" name="email" placeholder="Gmail" required />
            </div>
            <div className="container-input">
                <input type="password" name="password" placeholder="Contraseña" required />
            </div>
            <a href="restored.html">¿Olvidaste tu contraseña?</a>
            <a href="../Loginempresa/inicio.html">Soy una empresa</a>
            <button className="button">Iniciar Sesión</button>
        </form>
    );
};

export default LoginForm;
