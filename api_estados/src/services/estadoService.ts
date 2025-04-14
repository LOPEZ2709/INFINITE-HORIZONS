const API_URL = 'http://192.168.0.12/api_estados/controllers/EstadoController.php';

export const getEstados = async (): Promise<any[]> => {
  try {
    console.log('Iniciando solicitud GET...'); // ← Esto aparecerá en tu terminal
    const response = await fetch(API_URL);
    const rawData = await response.text();
    console.log('Respuesta cruda:', rawData); // ← Debug clave
    return JSON.parse(rawData).data;
  } catch (error) {
    console.error('Error detallado:', error); 
    return [];
  }
};

export const createEstado = async (desc_estado: string) => {
  try {
    const response = await fetch(`${API_URL}`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },
      body: JSON.stringify({ desc_estado })
    });
    
    const rawData = await response.text();
    console.log('Respuesta POST:', rawData); // Debug
    
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }
    
    return JSON.parse(rawData);
  } catch (error) {
    console.error('Error en createEstado:', error);
    throw error;
  }
};
export const updateEstado = async (id: number, desc_estado: string) => {
  try {
    const response = await fetch(`${API_URL}`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ id_estado: id, desc_estado })
    });
    return await response.json();
  } catch (error) {
    console.error('Error al actualizar:', error);
    throw error;
  }
};

export const deleteEstado = async (id: number) => {
  try {
    const response = await fetch(`${API_URL}`, {
      method: 'DELETE',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ id_estado: id })
    });
    return await response.json();
  } catch (error) {
    console.error('Error al eliminar:', error);
    throw error;
  }
};