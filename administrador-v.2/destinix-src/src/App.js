import React from "react";
import EventosRecomendados from "./components/EventosRecomendados";



const App = () => {
  return (
    <div className="app-container">
      {/* Contenido actual */}
      <h1>¡BIENVENIDOS A EL HIMALAYA! 🎉</h1>

      <EventosRecomendados />

      
      {/* Nuevo componente integrado */}
      <div style={{ marginTop: '50px', borderTop: '1px solid #eee', paddingTop: '30px' }}>


      </div>
    </div>
  );
};

export default App;