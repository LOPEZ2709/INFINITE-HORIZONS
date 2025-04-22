import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import App from "./App";
import Restaurante from "./pages/RestaurantePage";
import SitioCrear from "./pages/formulariositiopage"; // Asegúrate de que el nombre del archivo sea el correcto.
import 'antd/dist/reset.css';

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
  <BrowserRouter>
    <Routes>
      <Route path="/" element={<App />} />
      <Route path="/restaurante" element={<Restaurante />} />
      <Route path="/SitioCrear" element={<SitioCrear />} />

    </Routes>
  </BrowserRouter>
);
