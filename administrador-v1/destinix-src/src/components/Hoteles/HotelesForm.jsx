import React, { useState, useEffect } from "react";
import axios from "axios";
import "bootstrap/dist/css/bootstrap.min.css";
import * as bootstrap from "bootstrap";
import './SitiosForm.css';

window.bootstrap = bootstrap;

const HotelesForm = () => {
  const [titulo, setTitulo] = useState("");
  const [img, setImg] = useState(null);
  const [descripcion, setDescripcion] = useState("");
  const [estadoId, setEstadoId] = useState("");
  const [empresaId, setEmpresaId] = useState("");
  const [editando, setEditando] = useState(false);
  const [hotelEditandoId, setHotelEditandoId] = useState(null);

  const [estados, setEstados] = useState([]);
  const [empresas, setEmpresas] = useState([]);
  const [hoteles, setHoteles] = useState([]);

  useEffect(() => {
    axios.get("http://localhost/destinix/EstadoController.php")
      .then(res => setEstados(res.data))
      .catch(err => console.error("Error al obtener estados:", err));

    axios.get("http://localhost/destinix/EmpresaController.php")
      .then(res => setEmpresas(res.data))
      .catch(err => console.error("Error al obtener empresas:", err));

    obtenerHoteles();
  }, []);

  const obtenerHoteles = () => {
    axios.get("http://localhost/destinix/api/hoteles/HotelesController.php")
      .then(res => setHoteles(Array.isArray(res.data) ? res.data : []))
      .catch(err => {
        console.error("Error al obtener hoteles:", err);
        setHoteles([]);
      });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    const formData = new FormData();
    formData.append("titulo_hotel", titulo);
    formData.append("descripcion_hotel", descripcion);
    formData.append("estado_id_estado", estadoId);
    formData.append("empresa_id_empresa", empresaId);
    if (img) formData.append("img", img);

    try {
      if (editando) {
        formData.append("id_hoteles", hotelEditandoId);
        await axios.post("http://localhost/destinix/api/hoteles/HotelesController.php", formData);
        alert("Hotel actualizado correctamente");
      } else {
        await axios.post("http://localhost/destinix/api/hoteles/HotelesController.php", formData);
        alert("Hotel registrado exitosamente");
      }

      resetFormulario();
      obtenerHoteles();
      document.getElementById("cerrarModal").click();
    } catch (error) {
      console.error("Error al enviar hotel:", error);
    }
  };

  const handleEditar = (hotel) => {
    setEditando(true);
    setHotelEditandoId(hotel.id_hoteles);
    setTitulo(hotel.titulo_hotel);
    setDescripcion(hotel.descripcion_hotel);
    setEstadoId(hotel.estado_id_estado);
    setEmpresaId(hotel.empresa_id_empresa);
    setImg(null);

    const modalElement = document.getElementById("modalHotel");
    const modalInstance = window.bootstrap.Modal.getOrCreateInstance(modalElement);
    modalInstance.show();
  };

  const handleEliminar = async (id) => {
    if (window.confirm("¿Estás seguro de eliminar este hotel?")) {
      try {
        await axios.delete(`http://localhost/destinix/api/hoteles/HotelesController.php?id=${id}`);
        obtenerHoteles();
      } catch (error) {
        console.error("Error al eliminar hotel:", error);
      }
    }
  };

  const resetFormulario = () => {
    setTitulo("");
    setImg(null);
    setDescripcion("");
    setEstadoId("");
    setEmpresaId("");
    setEditando(false);
    setHotelEditandoId(null);
  };

  return (
    <div className="container mt-5">
      <div className="d-flex justify-content-between align-items-center mb-3">
        <h2 className="fw-bold">Gestión de Hoteles</h2>
        <button
          className="btn btn-success px-4"
          data-bs-toggle="modal"
          data-bs-target="#modalHotel"
          onClick={resetFormulario}
        >
          Ingresar Hotel
        </button>
      </div>

      {/* ... tabla renderizando hoteles ... */}

      {/* Modal */}
      <div className="modal fade" id="modalHotel" tabIndex="-1" aria-labelledby="modalHotelLabel" aria-hidden="true">
        <div className="modal-dialog modal-lg modal-dialog-centered">
          <div className="modal-content">
            <form onSubmit={handleSubmit}>
              <div className="modal-header">
                <h5 className="modal-title" id="modalHotelLabel">
                  {editando ? "Editar Hotel" : "Registrar Hotel"}
                </h5>
                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
              </div>
              <div className="modal-body">
                {/* Campos adaptados */}
                <div className="row g-3">
                  <div className="col-md-6">
                    <label className="form-label">Título del Hotel</label>
                    <input type="text" className="form-control" value={titulo} onChange={e => setTitulo(e.target.value)} required />
                  </div>
                  <div className="col-md-6">
                    <label className="form-label">Imagen</label>
                    <input type="file" className="form-control" onChange={e => setImg(e.target.files[0])} accept="image/*" {...(!editando && { required: true })} />
                  </div>
                  <div className="col-12">
                    <label className="form-label">Descripción</label>
                    <textarea className="form-control" rows="3" value={descripcion} onChange={e => setDescripcion(e.target.value)} required />
                  </div>
                  <div className="col-md-6">
                    <label className="form-label">Estado</label>
                    <select className="form-select" value={estadoId} onChange={e => setEstadoId(e.target.value)} required>
                      <option value="">Seleccione un estado</option>
                      {estados.map((e) => (
                        <option key={e.id_estado} value={e.id_estado}>{e.desc_estado}</option>
                      ))}
                    </select>
                  </div>
                  <div className="col-md-6">
                    <label className="form-label">Empresa</label>
                    <select className="form-select" value={empresaId} onChange={e => setEmpresaId(e.target.value)} required>
                      <option value="">Seleccione una empresa</option>
                      {empresas.map((em) => (
                        <option key={em.id_empresa} value={em.id_empresa}>{em.nombre_empresa}</option>
                      ))}
                    </select>
                  </div>
                </div>
              </div>
              <div className="modal-footer">
                <button type="button" className="btn btn-secondary" data-bs-dismiss="modal" id="cerrarModal">
                  Cancelar
                </button>
                <button type="submit" className="btn btn-success">
                  {editando ? "Actualizar Hotel" : "Guardar Hotel"}
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  );
};

export default HotelesForm;
