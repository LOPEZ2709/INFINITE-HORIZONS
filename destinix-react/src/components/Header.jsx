// src/components/Header.jsx
import React from "react";
import "./Dashboard.css";

const Header = () => {
    return (
        <header>
            <h1>INFINITE HORIZONS</h1>
            <p className="p-no">
                Bienvenid@ a Infinite Horizons, aquí podrás ver hoteles, restaurantes y
                lugares que podrás visitar en Bogotá.
            </p>
            <p className="p-no">¡Sé libre de explorarla!</p>
            <hr />
        </header>
    );
};

export default Header;
