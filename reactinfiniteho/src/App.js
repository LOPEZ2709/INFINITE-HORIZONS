// src/App.js
import React from "react";
import { Routes, Route } from "react-router-dom";
import Index from "./pages/index"; // Página de inicio
import Login from "./pages/login"; // Página de login

const App = () => {
  return (
    <Routes>
      <Route path="/" element={<Index />} /> {/* Página principal */}
      <Route path="/login" element={<Login />} /> {/* Página de login */}
    </Routes>
  );
};

export default App;
