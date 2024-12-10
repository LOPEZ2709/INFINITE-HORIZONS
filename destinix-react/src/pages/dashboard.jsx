// src/pages/dashboard.js
import React from 'react';
import Sidebar from '../components/sidebar'; // Asegúrate de que la ruta sea correcta
import Header from '../components/Header'; // Asegúrate de que la ruta sea correcta
import Slider from '../components/Slider'; // Asegúrate de que la ruta sea correcta
import Card from '../components/card'; // Asegúrate de que la ruta sea correcta

const Dashboard = () => {
    return (
        <div style={{ display: "flex", minHeight: "100vh" }}>
            {/* Sidebar */}
            <Sidebar />

            {/* Main content */}
            <div style={{ flex: 1, padding: "20px" }}>
                {/* Header */}
                <Header />

                {/* Slider */}
                <Slider />

                {/* Cards section */}
                <div style={{ display: "flex", gap: "20px", marginTop: "20px" }}>
                    <Card title="Card 1" content="Content for card 1" />
                    <Card title="Card 2" content="Content for card 2" />
                    <Card title="Card 3" content="Content for card 3" />
                </div>
            </div>
        </div>
    );
};

export default Dashboard;
