import React from "react";
import { BrowserRouter as Router, Route, Routes, Link } from "react-router-dom";
import ShowRestaurantes from "./components/ShowRestaurantes";
import EventosRecomendados from "./components/EventosRecomendados";
import SitiosForm from './components/SitiosTuristicos/formulariositiopage'
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

function App() {
  const [refreshList, setRefreshList] = React.useState(false);

  const refresh = () => {
    setRefreshList(!refreshList);
  };

  return (
    <Router>
      <div>
        <nav style={{ marginBottom: "20px" }}>
          <Link to="/" style={{ marginRight: "15px" }}>Inicio</Link>
          <Link to="/ShowRestaurantes" style={{ marginRight: "15px" }}>Restaurantes</Link>
          <Link to="/eventosRecomendados" style={{ marginRight: "15px" }}>Eventos</Link>
          <Link to="/sitios" style={{ marginRight: "15px" }}>Sitios Turísticos</Link>
        </nav>

        <Routes>
          <Route path="/" element={<div>Bienvenido a la plataforma de gestión turística</div>} />
          <Route path="/ShowRestaurantes" element={<ShowRestaurantes />} />
          <Route path="/eventosRecomendados" element={<EventosRecomendados />} />
          <Route path="/sitios" element={<SitiosForm refresh={refresh} />} />
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
      </div>
    </Router>
  );
}

export default App;
