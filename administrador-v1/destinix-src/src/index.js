import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import App from "./App";
import SitioCrear from "./pages/formulariositiopage";
import FormularioHotelesPage from "./pages/FormularioHotelesPage";
import FormularioRestaurantesPage from "./pages/FormularioRestaurantesPage";
import 'antd/dist/reset.css';

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
  <BrowserRouter>
    <Routes>
      <Route path="/" element={<App />} />
      <Route path="/SitioCrear" element={<SitioCrear />} />
      <Route path="/hoteles" element={<FormularioHotelesPage />} />
      <Route path="/restaurantes" element={<FormularioRestaurantesPage />} />
    </Routes>
  </BrowserRouter>
);
