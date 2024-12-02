import React, { useState, useEffect } from 'react';
import { Dashboard as fetchDashboardData } from '../services/api';  // Asegúrate de importar correctamente la función

const Dashboard = () => {
  const [data, setData] = useState(null);
  const [loading, setLoading] = useState(true);  // Agrega un estado para controlar la carga

  useEffect(() => {
    const fetchData = async () => {
      try {
        const result = await fetchDashboardData(); // Usar la función desde api.js
        setData(result.data);  // Asegúrate de que la respuesta tenga la forma correcta
      } catch (error) {
        console.error('Error fetching data:', error);
      } finally {
        setLoading(false);  // Al finalizar la carga, cambia el estado de loading
      }
    };

    fetchData();
  }, []);

  if (loading) {
    return <div>Loading...</div>;
  }

  if (!data) {
    return <div>No data available</div>;
  }

  return (
    <div>
      <h1>Dashboard</h1>
      {/* Renderiza los datos aquí, por ejemplo: */}
      {data.map((item, index) => (
        <div key={index}>
          <p>{item.name}</p>
          {/* Mostrar los datos relevantes de cada elemento */}
        </div>
      ))}
    </div>
  );
};

export default Dashboard;
