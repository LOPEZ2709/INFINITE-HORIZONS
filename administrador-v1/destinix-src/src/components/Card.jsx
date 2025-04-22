import React from "react";
import "../styles/Card.css"; 
import { Link } from "react-router-dom";

const Card = ({ imagen, titulo, descripcion, enlace }) => {
  return (
    <div className="card">
      <img src={imagen} alt={titulo} className="card-img" />
      <div className="card-body">
        <h3>{titulo}</h3>
        <p>{descripcion}</p>
        <Link to={enlace} className="btn">
          Ver Más
        </Link>
      </div>
    </div>
  );
};

export default Card;

