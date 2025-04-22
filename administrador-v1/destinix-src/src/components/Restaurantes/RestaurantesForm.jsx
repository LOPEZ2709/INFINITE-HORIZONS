import React, { useState, useEffect } from 'react';
import { Form, Input, Button, Select, Upload, message, Spin } from 'antd';
import { UploadOutlined } from '@ant-design/icons';
import { createRestaurante, updateRestaurante, getEstados, getEmpresas } from '../../api/Restaurantes';

const { TextArea } = Input;
const { Option } = Select;

const RestauranteForm = ({ restaurante, onSuccess, onCancel }) => {
  const [form] = Form.useForm();
  const [loading, setLoading] = useState(false);
  const [estados, setEstados] = useState([]);
  const [empresas, setEmpresas] = useState([]);
  const [fileList, setFileList] = useState([]);
  const [fetching, setFetching] = useState(false);

  // Configuración de subida de imágenes
  const beforeUpload = (file) => {
    const isImage = file.type.startsWith('image/');
    const isLt5M = file.size / 1024 / 1024 < 5;

    if (!isImage) {
      message.error('¡Solo se permiten imágenes!');
      return Upload.LIST_IGNORE;
    }
    if (!isLt5M) {
      message.error('¡La imagen debe pesar menos de 5MB!');
      return Upload.LIST_IGNORE;
    }
    return true;
  };

  const handleUploadChange = ({ fileList: newFileList }) => {
    setFileList(newFileList);
  };

  // Cargar datos iniciales
  useEffect(() => {
    const loadInitialData = async () => {
      setFetching(true);
      try {
        const [estadosRes, empresasRes] = await Promise.all([
          getEstados(),
          getEmpresas()
        ]);
        
        setEstados(estadosRes.data || []);
        setEmpresas(empresasRes.data || []);

        if (restaurante) {
          form.setFieldsValue({
            titulo_restaurante: restaurante.titulo_restaurante,
            desc_restaurantes: restaurante.desc_restaurantes,
            estado_id_estado: restaurante.estado_id_estado,
            empresa_id_empresa: restaurante.empresa_id_empresa
          });
          
          if (restaurante.img) {
            setFileList([{
              uid: '-1',
              name: 'imagen-actual',
              status: 'done',
              url: `http://localhost:4000${restaurante.img}`
            }]);
          }
        }
      } catch (error) {
        message.error('Error cargando datos iniciales');
      } finally {
        setFetching(false);
      }
    };
    
    loadInitialData();
  }, [restaurante, form]);

  const handleSubmit = async (values) => {
    setLoading(true);
    try {
      const formData = new FormData();
      formData.append("titulo_restaurante", values.titulo_restaurante);
      formData.append("desc_restaurantes", values.desc_restaurantes);
      formData.append("estado_id_estado", values.estado_id_estado);
      formData.append("empresa_id_empresa", values.empresa_id_empresa);

      if (fileList.length > 0 && fileList[0].originFileObj) {
        formData.append("img", fileList[0].originFileObj);
      }

      if (restaurante) {
        formData.append("id_restaurante", restaurante.id_restaurante);
        await updateRestaurante(formData);
        message.success("Restaurante actualizado correctamente");
      } else {
        await createRestaurante(formData);
        message.success("Restaurante creado correctamente");
      }
      onSuccess();  // Devuelve al padre la señal de éxito
    } catch (error) {
      message.error("Error al guardar el restaurante");
    } finally {
      setLoading(false);
    }
  };

  return (
    <Spin spinning={fetching || loading}>
      <Form
        form={form}
        layout="vertical"
        onFinish={handleSubmit}
      >
        <Form.Item
          label="Nombre del Restaurante"
          name="titulo_restaurante"
          rules={[{ required: true, message: "Por favor ingresa el nombre" }]}
        >
          <Input />
        </Form.Item>

        <Form.Item
          label="Descripción"
          name="desc_restaurantes"
          rules={[{ required: true, message: "Por favor ingresa una descripción" }]}
        >
          <TextArea rows={4} />
        </Form.Item>

        <Form.Item
          label="Estado"
          name="estado_id_estado"
          rules={[{ required: true, message: "Por favor selecciona un estado" }]}
        >
          <Select placeholder="Selecciona un estado">
            {estados.map((estado) => (
              <Option key={estado.id_estado} value={estado.id_estado}>
                {estado.nombre_estado}
              </Option>
            ))}
          </Select>
        </Form.Item>

        <Form.Item
          label="Empresa"
          name="empresa_id_empresa"
          rules={[{ required: true, message: "Por favor selecciona una empresa" }]}
        >
          <Select placeholder="Selecciona una empresa">
            {empresas.map((empresa) => (
              <Option key={empresa.id_empresa} value={empresa.id_empresa}>
                {empresa.nombre_empresa}
              </Option>
            ))}
          </Select>
        </Form.Item>

        <Form.Item label="Imagen">
          <Upload
            listType="picture"
            beforeUpload={beforeUpload}
            onChange={handleUploadChange}
            fileList={fileList}
            maxCount={1}
          >
            <Button icon={<UploadOutlined />}>Seleccionar Imagen</Button>
          </Upload>
        </Form.Item>

        <Form.Item>
          <Button type="primary" htmlType="submit" loading={loading}>
            {restaurante ? "Actualizar" : "Crear"}
          </Button>
          <Button style={{ marginLeft: 8 }} onClick={onCancel}>
            Cancelar
          </Button>
        </Form.Item>
      </Form>
    </Spin>
  );
};

export default RestauranteForm;