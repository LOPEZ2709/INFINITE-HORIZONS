import React from "react";
import { useNavigate } from "react-router-dom";

const BackButton = () => {
    const navigate = useNavigate();

    const handleBack = () => {
        navigate("/");  // Navigate to the homepage
    };

    return (
        <button onClick={handleBack}
            style={{
                position: "absolute",
                top: "10px",
                left: "10px",
                backgroundColor: "#205fb8",
                color: "white",
                padding: "10px 15px",
                borderRadius: "5px",
                cursor: "pointer",
            }}>
            Volver
        </button>
    );
};

export default BackButton;
