// src/components/Sidebar.jsx
import React from "react";
import "./sidebar.css";

const Sidebar = () => {
    return (
        <nav className="barra-lateral">
            <ul>
                <li>
                    <a href="/dashboard" className="logo">
                        <img src="/imagenes/Logo1.1.png" alt="" />
                        <span className="nav-item">Infinite Horizons</span>
                    </a>
                </li>
                <li>
                    <a href="1.html">
                        <i className="fas fa-home"></i>
                        <span className="nav-item">Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="./barra-lateral/itinerario.html">
                        <i className="fas fa-calendar-alt"></i>
                        <span className="nav-item">Itinerario</span>
                    </a>
                </li>
                <li>
                    <a href="./barra-lateral/planes.html">
                        <i className="fas fa-map-marked-alt"></i>
                        <span className="nav-item">Planes De Viaje</span>
                    </a>
                </li>
                <li>
                    <a href="./barra-lateral/turismo.html">
                        <i className="fas fa-plane-departure"></i>
                        <span className="nav-item">Turismo</span>
                    </a>
                </li>
                <li>
                    <a href="./barra-lateral/restaurantes.html">
                        <i className="fas fa-utensils"></i>
                        <span className="nav-item">Restaurantes</span>
                    </a>
                </li>
                <li>
                    <a href="./barra-lateral/hoteles.html">
                        <i className="fas fa-hotel"></i>
                        <span className="nav-item">Hotelería</span>
                    </a>
                </li>
                <li>
                    <a href="./barra-lateral/mensajes.html">
                        <i className="fas fa-envelope"></i>
                        <span className="nav-item">Mensajes</span>
                    </a>
                </li>
                <li>
                    <a href="./barra-lateral/comentarios.html">
                        <i className="fas fa-comments"></i>
                        <span className="nav-item">Comentarios</span>
                    </a>
                </li>
                <li>
                    <a href="./barra-lateral/notificaciones.html">
                        <i className="fas fa-bell"></i>
                        <span className="nav-item">Notificaciones</span>
                    </a>
                </li>
                <li>
                    <a href="./barra-lateral/ajustes.html">
                        <i className="fas fa-cogs"></i>
                        <span className="nav-item">Ajustes</span>
                    </a>
                </li>
            </ul>
        </nav>
    );
};

export default Sidebar;
