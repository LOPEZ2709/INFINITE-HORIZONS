// src/components/Slider.jsx
import React from "react";
import "./Dashboard.css";

const Slider = () => {
    const images = [
        "../styles/buscando.jpg",
        "../styles/monserrate.jpg",
        "../styles/playita.jpg",
        "../styles/restaurante.jpg",
        "../styles/paisaje3.jpg",
        "../styles/paisaje1.jpg",
        "../styles/panoramica-maloka-bogota.jpg",
    ];

    return (
        <div className="slider">
            <div className="slide-track">
                {images.map((img, index) => (
                    <div className="slide" key={index}>
                        <img src={img} alt={`Slide ${index + 1}`} />
                    </div>
                ))}
            </div>
        </div>
    );
};

export default Slider;
