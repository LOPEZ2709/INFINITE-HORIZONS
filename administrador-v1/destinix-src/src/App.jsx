import React from "react";
import { BrowserRouter as Router, Route, Routes, Link } from "react-router-dom";
import RestaurantForm from "./components/RestaurantForm";
import ShowRestaurantes from "./components/ShowRestaurantes";
import EventosRecomendados from "./components/EventosRecomendados";
import SitiosForm from './components/SitiosTuristicos/SitiosForm';
import SitiosList from './components/SitiosTuristicos/SitiosList';

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
          {/* Página principal con formulario de restaurantes */}
          <Route path="/" element={
            <>
              <h1>Restaurantes</h1>
              <RestaurantForm refresh={() => window.location.reload()} />
            </>
          } />

          {/* Mostrar lista de restaurantes */}
          <Route path="/ShowRestaurantes" element={<ShowRestaurantes />} />

          {/* Página de eventos recomendados */}
          <Route path="/eventosRecomendados" element={<EventosRecomendados />} />

          {/* Página para listar sitios turísticos */}
          <Route path="/sitios" element={<SitiosList />} />

          {/* Página para agregar un nuevo sitio turístico */}
          <Route path="/sitios/crear" element={<SitiosForm refresh={refresh} />} />
        </Routes>
      </div>
    </Router>
  );
}

export default App;



