import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import App from "./App";

// Formularios de entidades
import SitioCrear from "./pages/formulariositiopage";
import FormularioHotelesPage from "./pages/FormularioHotelesPage";
import FormularioRestaurantesPage from "./pages/FormularioRestaurantesPage";
import FormularioCalificacionPage from "./pages/FormularioCalificacionPage";
import FormularioCategoriaPage from "./pages/FormularioCategoriaPage";
import FormularioEmpresaPage from "./pages/FormularioEmpresaPage";
import FormularioEstadoPage from "./pages/FormularioEstadoPage";
import FormularioItinerarioPage from "./pages/FormularioItinerarioPage";
import FormularioPersonaPage from "./pages/FormularioPersonaPage";
import FormularioReservaPage from "./pages/FormularioReservaPage";
import FormularioRolPage from "./pages/FormularioRolPage";
import FormularioSeguridadPage from "./pages/FormularioSeguridadPage";

import 'antd/dist/reset.css';

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
  <BrowserRouter>
    <Routes>
      <Route path="/" element={<App />} />
      <Route path="/Sitios" element={<SitioCrear />} />
      <Route path="/hoteles" element={<FormularioHotelesPage />} />
      <Route path="/restaurantes" element={<FormularioRestaurantesPage />} />
      <Route path="/calificacion" element={<FormularioCalificacionPage />} />
      <Route path="/categoria" element={<FormularioCategoriaPage />} />
      <Route path="/empresa" element={<FormularioEmpresaPage />} />
      <Route path="/estado" element={<FormularioEstadoPage />} />
      <Route path="/itinerario" element={<FormularioItinerarioPage />} />
      <Route path="/persona" element={<FormularioPersonaPage />} />
      <Route path="/reserva" element={<FormularioReservaPage />} />
      <Route path="/rol" element={<FormularioRolPage />} />
      <Route path="/seguridad" element={<FormularioSeguridadPage />} />
    </Routes>
  </BrowserRouter>
);
