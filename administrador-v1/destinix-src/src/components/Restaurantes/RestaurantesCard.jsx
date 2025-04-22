
import React from 'react';
import image from "../../../public/img/Restaurante.png";

const RestauranteCard = ({ restaurante, onDelete }) => {
  return (
    <div className="border rounded-lg overflow-hidden shadow hover:shadow-md transition-shadow">
      {restaurante.img && (
        // Corregir nombre de propiedad y ruta
<img 
  src={restaurante.img ? `http://localhost/destinix/public/img/${restaurante.img}` : image} 
  className="w-full h-48 object-cover"
/>
      )}
      
      <div className="p-4">
        <h3 className="text-xl font-semibold mb-2">{restaurante.titulo_restaurante}</h3>
        <p className="text-gray-600 mb-3">{restaurante.desc_restaurantes}</p>
        
        <div className="flex justify-between items-center">
          <span className="text-sm text-gray-500">
            Estado: {restaurante.estado}
          </span>
          
          <button 
            onClick={() => onDelete(restaurante.id_restaurante)}
            className="text-red-500 hover:text-red-700"
          >
            Eliminar
          </button>
        </div>
      </div>
    </div>
  );
};

export default RestauranteCard;