import React, { useState, useEffect } from "react";  // Mantén esta línea
import axios from 'axios';
import RestaurantesForm from "./RestaurantesForm";
import { Button, Table, Modal, message, Spin, Image, Card, Alert, Radio, Space } from "antd";
import Swal from "sweetalert2";
import "../../styles/RestauranteTable.css";



const { Meta } = Card;  

const RestauranteManager = () => {
  const [restaurantes, setRestaurantes] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    fetch("http://localhost/destinix/api/RestaurantesMetodos/ObtenerRestaurante.php")
      .then(response => {
        console.log('Response:', response);  
        return response.json();  
      })
      .then(data => {
        console.log('Data:', data);  
        setRestaurantes(data);  
        setLoading(false);      
      })
      .catch(error => {
        console.error("Error al obtener restaurantes:", error);  
        setLoading(false);
      });
  }, []);

  if (loading) {
    return <div>Loading...</div>;
  }

  return (
    <div>
      <h1>Restaurantes</h1>
      <ul>
        {restaurantes.map((restaurante) => (
          <li key={restaurante.id}>{restaurante.nombre}</li>
        ))}
      </ul>
    </div>
  );
};


const RestaurantesManager = () => {
  const [restaurantes, setRestaurantes] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);
  const [modalVisible, setModalVisible] = useState(false);
  const [restauranteActual, setRestauranteActual] = useState(null);
  const [viewMode, setViewMode] = useState('table');

  const fetchRestaurantes = async () => {
    setLoading(true);
    setError(null);
    try {
      const response = await axios.get('http://localhost/destinix/api/RestaurantesMetodos/ObtenerRestaurante.php');
      if (response.data.success) {
        setRestaurantes(response.data.data || []);
      } else {
        throw new Error(response.data.message || "Error al obtener restaurantes");
      }
    } catch (err) {
      setError(err.message);
      message.error(err.message);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    fetchRestaurantes();
  }, []);

  const handleDelete = async (id) => {
    Swal.fire({
      title: "¿Estás seguro?",
      text: "Esta acción no se puede deshacer",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "Cancelar",
    }).then(async (result) => {
      if (result.isConfirmed) {
        try {
          await axios.post('http://localhost/destinix/api/RestaurantesMetodos/EliminarRestaurante.php', { id_restaurante: id });
          message.success("Restaurante eliminado correctamente");
          fetchRestaurantes();
        } catch (err) {
          message.error("Error al eliminar restaurante: " + err.message);
        }
      }
    });
  };

  const columns = [
    {
      title: "ID",
      dataIndex: "id_restaurante",
      key: "id_restaurante",
      sorter: (a, b) => a.id_restaurante - b.id_restaurante,
      width: 80,
    },
    {
      title: "Nombre",
      dataIndex: "titulo_restaurante",
      key: "titulo_restaurante",
      sorter: (a, b) => a.titulo_restaurante.localeCompare(b.titulo_restaurante),
      width: 200,
    },
    {
      title: "Imagen",
      dataIndex: "img",
      key: "img",
      render: (img, record) => {
        const imagePath = img ? `http://localhost:4000${img}` : "https://via.placeholder.com/150";
        return (
          <Image
            src={imagePath}
            alt={record.titulo_restaurante}
            width={80}
            height={80}
            style={{
              objectFit: "cover",
              borderRadius: "4px",
              border: "1px solid #f0f0f0",
            }}
            preview={{
              maskClassName: "image-preview-mask",
              mask: "Ver en grande",
            }}
          />
        );
      },
      width: 120,
    },
    {
      title: "Descripción",
      dataIndex: "desc_restaurantes",
      key: "desc_restaurantes",
      ellipsis: {
        showTitle: true,
      },
      width: 300,
    },
    {
      title: "Acciones",
      key: "acciones",
      fixed: "right",
      width: 200,
      render: (_, record) => (
        <div style={{ display: 'flex', gap: '8px' }}>
          <Button
            type="primary"
            onClick={() => {
              setRestauranteActual(record);
              setModalVisible(true);
            }}
          >
            Editar
          </Button>
          <Button 
            danger 
            onClick={() => handleDelete(record.id_restaurante)}
          >
            Eliminar
          </Button>
        </div>
      ),
    },
  ];

  if (loading) {
    return (
      <div style={{ display: 'flex', justifyContent: 'center', alignItems: 'center', minHeight: '300px' }}>
<Spin spinning={loading} tip="Cargando...">
  <div className="contenido">
    {/* Tu contenido que estará esperando */}
  </div>
</Spin>
</div>
    );
  }

  if (error) {
    return (
      <Alert
        message="Error"
        description={
          <>
            <p>{error}</p>
            <p>Prueba estos pasos:</p>
            <ol>
              <li>Abre XAMPP e inicia Apache</li>
              <li>
                Visita directamente: 
                <a href="http://localhost/destinix/api/Restaurantes/ObtenerRestaurante.php" target="_blank" rel="noopener noreferrer">
                  http://localhost/destinix/api/Restaurantes/ObtenerRestaurante.php
                </a>
              </li>
              <li>Verifica la consola del navegador (F12)</li>
            </ol>
          </>
        }
        type="error"
        showIcon
        style={{ margin: '20px' }}
      />
    );
  }

  return (
    <div className="container-restaurantes">
      <div className="header-tabla">
        <h2>Gestor de Restaurantes</h2>
        <Space>
          <Radio.Group 
            value={viewMode} 
            onChange={(e) => setViewMode(e.target.value)}
            buttonStyle="solid"
          >
            <Radio.Button value="table">Vista de Tabla</Radio.Button>
            <Radio.Button value="cards">Vista de Tarjetas</Radio.Button>
          </Radio.Group>
          <Button
            type="primary"
            onClick={() => {
              setRestauranteActual(null);
              setModalVisible(true);
            }}
            size="large"
          >
            + Agregar Restaurante
          </Button>
        </Space>
      </div>

      {viewMode === 'table' ? (
        <Table
          columns={columns}
          dataSource={restaurantes}
          rowKey="id_restaurante"
          pagination={{ pageSize: 8, showSizeChanger: true }}
          scroll={{ x: 900 }}
          loading={loading}
          locale={{ emptyText: "No hay restaurantes disponibles" }}
          bordered
        />
      ) : (
        <div className="restaurantes-grid">
          {restaurantes.map(rest => (
            <Card
              key={rest.id_restaurante}
              hoverable
              cover={
                <Image
                  src={rest.img ? `http://localhost:4000${rest.img}` : "https://via.placeholder.com/300"}
                  alt={rest.titulo_restaurante}
                  height={150}
                  style={{ objectFit: 'cover', borderBottom: '1px solid #f0f0f0' }}
                  preview={false}
                />
              }
              style={{ width: 300, margin: '10px' }}
              actions={[
                <Button 
                  type="primary" 
                  onClick={() => {
                    setRestauranteActual(rest);
                    setModalVisible(true);
                  }}
                >
                  Editar
                </Button>,
                <Button 
                  danger 
                  onClick={() => handleDelete(rest.id_restaurante)}
                >
                  Eliminar
                </Button>
              ]}
            >
              <Meta
                title={rest.titulo_restaurante}
                description={
                  <div className="restaurante-description">
                    <p>{rest.desc_restaurantes}</p>
                    <div className="restaurante-id">ID: {rest.id_restaurante}</div>
                  </div>
                }
              />
            </Card>
          ))}
        </div>
      )}

      <Modal
        title={restauranteActual ? "Editar Restaurante" : "Nuevo Restaurante"}
        open={modalVisible}
        onCancel={() => setModalVisible(false)}
        footer={null}
        width={800}
        destroyOnClose
      >
        <RestaurantesForm
          restaurante={restauranteActual}
          onSuccess={() => {
            setModalVisible(false);
            fetchRestaurantes();
          }}
          onCancel={() => setModalVisible(false)}
        />
      </Modal>
    </div>
  );
};

export default RestaurantesManager;
