// src/components/EventSection.jsx
import React from "react";
import Card from "./card";
import "../styles/Dashboard";

const events = [
    {
        image: "/img/hotel2.jpg",
        title: "Hotelería",
        description: "Ofrecemos una selección de hoteles y alojamientos...",
        link: "/hoteles",
    },
    // Repite para otros eventos
];

const EventSection = () => {
    return (
        <section className="main-course">
            <h1>EVENTOS RECOMENDADOS</h1>
            <p className="p-no">Aquí podrás ver los eventos recomendados que te estaremos ofreciendo.</p>
            <div className="card-container">
                {events.map((event, index) => (
                    <Card key={index} {...event} />
                ))}
            </div>
        </section>
    );
};

export default EventSection;
