import React from "react";
import { Link } from "react-router-dom";
import Card from "../components/Card"; // Asegúrate que Card.jsx esté en /components
import "../styles/EventosRecomendados.css"; // Asegúrate que este archivo exista

const eventos = [
  {
    imagen: "/img/chorro.jpg",
    titulo: "Ingresa un restaurante",
    descripcion: "Esto se debe mover al apartado del administrador",
    enlace: "/Restaurante"
  },
  {
    imagen: "/img/chorro.jpg",
    titulo: "Ingresa un sitio - Crear",
    descripcion: "Esto se debe mover al apartado del administrador",
    enlace: "/SitioCrear"
  },
  
];

const EventosRecomendados = () => {
  return (
    <section className="main-course">
      <h1>EVENTOS RECOMENDADOS</h1>
      <p className="p-no">Aquí podrás ver los eventos recomendados que te estaremos ofreciendo.</p>
      <hr />
      <div className="course-box">
        <div className="card-container">
          {eventos.map((evento, index) => (
            <Link key={index} to={evento.enlace} style={{ textDecoration: "none", color: "inherit" }}>
              <Card {...evento} />
            </Link>
          ))}
        </div>
      </div>
    </section>
  );
};

export default EventosRecomendados;
