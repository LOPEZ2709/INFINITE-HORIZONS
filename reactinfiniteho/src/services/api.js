export const registerUser = async (userData) => {
    try {
        const response = await fetch("http://localhost/register.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(userData),
        });

        const data = await response.json();
        return data;
    } catch (error) {
        console.error("Error en registerUser:", error);
        throw error;
    }
};

export const loginUser = async (email, contraseña) => {
    try {
        const response = await fetch("http://localhost/login.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ email, contraseña }),
        });

        const data = await response.json();
        return data;
    } catch (error) {
        console.error("Error en loginUser:", error);
        throw error;
    }
};
