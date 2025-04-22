
import React from 'react';
import RestauranteManager from '../components/Restaurantes/RestauranteManager.jsx';

const RestaurantePage = () => {
  return (
    <div className="container mx-auto px-4 py-8">
      <h1 className="text-3xl font-bold mb-6">Gestiónn de Restaurantes</h1>
      <RestauranteManager />
    </div>
  );
};

export default RestaurantePage;