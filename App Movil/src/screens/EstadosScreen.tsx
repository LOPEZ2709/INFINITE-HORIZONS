import React, { useState, useEffect } from 'react';
import { View, Text, StyleSheet, TouchableOpacity, Modal, Alert, ActivityIndicator,ScrollView } from 'react-native';
import { getEstados, createEstado, updateEstado, deleteEstado } from '../services/estadoService';
import EstadoForm from '../components/EstadoForm';
import EstadoCard from '../components/EstadoCard';

const EstadosScreen = () => {
  const [modalVisible, setModalVisible] = useState(false);
  const [estados, setEstados] = useState<any[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState('');
  const [editingEstado, setEditingEstado] = useState<{ id: number | null; desc: string }>({ 
    id: null, 
    desc: '' 
  });

  const cargarEstados = async () => {
    try {
      setLoading(true);
      const data = await getEstados();
      setEstados(data);
      setError('');
    } catch (err) {
      setError('Error al cargar estados');
      setEstados([]);
    } finally {
      setLoading(false);
    }
  };

  const handleDelete = async (id: number) => {
    Alert.alert(
      'Confirmar eliminación',
      '¿Estás seguro de eliminar este estado?',
      [
        { text: 'Cancelar', style: 'cancel' },
        { 
          text: 'Eliminar', 
          style: 'destructive',
          onPress: async () => {
            try {
              await deleteEstado(id);
              await cargarEstados();
            } catch (err) {
              setError('Error al eliminar');
            }
          }
        }
      ]
    );
  };

  const handleSubmit = async (desc_estado: string) => {
    try {
      if (editingEstado.id) {
        await updateEstado(editingEstado.id, desc_estado);
      } else {
        await createEstado(desc_estado);
      }
      setModalVisible(false);
      await cargarEstados();
    } catch (err) {
      setError('Error al guardar');
    }
  };

  useEffect(() => {
    cargarEstados();
  }, []);

  if (loading) {
    return (
      <View style={[styles.container, styles.loadingContainer]}>
        <ActivityIndicator size="large" color="#388276" />
      </View>
    );
  }

  return (
    <View style={styles.container}>
      <View style={styles.header}>
        <Text style={styles.title}>Estados</Text>
        <TouchableOpacity
          style={styles.addButton}
          onPress={() => {
            setEditingEstado({ id: null, desc: '' });
            setModalVisible(true);
          }}
        >
          <Text style={styles.addButtonText}>+ Nuevo</Text>
        </TouchableOpacity>
      </View>

      {error ? <Text style={styles.errorText}>{error}</Text> : null}

      <ScrollView contentContainerStyle={styles.scrollContainer}>
  {estados.length > 0 ? (
    estados.map((estado) => (
      <EstadoCard
        key={estado.id_estado.toString()}
        estado={estado}
        onEdit={(id, desc) => {
          setEditingEstado({ id, desc });
          setModalVisible(true);
        }}
        onDelete={handleDelete}
      />
    ))
  ) : (
    <Text style={styles.noDataText}>No hay registros</Text>
  )}
</ScrollView>

      <Modal
        visible={modalVisible}
        transparent={true}
        animationType="slide"
        onRequestClose={() => setModalVisible(false)}
      >
        <View style={styles.modalBackdrop}>
          <View style={styles.modalContent}>
            <EstadoForm
              onSubmit={handleSubmit}
              initialValue={editingEstado.desc}
              isEditing={!!editingEstado.id}
              onCancel={() => setModalVisible(false)}
            />
          </View>
        </View>
      </Modal>
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    padding: 16,
    backgroundColor: '#f8f9fa',
  },
  loadingContainer: {
    justifyContent: 'center',
    alignItems: 'center',
  },
  scrollContainer: {
    flexGrow: 1,
    paddingTop: 24,
    paddingBottom: 80,
  },
  header: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center',
    marginBottom: 20,
  },
  title: {
    fontSize: 24,
    fontWeight: 'bold',
    color: '#000',
  },
  addButton: {
    backgroundColor: '#0349b4',
    paddingVertical: 10,
    paddingHorizontal: 15,
    borderRadius: 6,
  },
  addButtonText: {
    color: 'white',
    fontWeight: '500',
  },
  errorText: {
    color: '#e74c3c',
    textAlign: 'center',
    marginVertical: 10,
  },
  noDataText: {
    textAlign: 'center',
    color: '#95a5a6',
    marginTop: 20,
  },
  modalBackdrop: {
    flex: 1,
    backgroundColor: 'rgba(0,0,0,0.5)',
    justifyContent: 'center',
    alignItems: 'center',
  },
  modalContent: {
    width: '90%',
    backgroundColor: 'white',
    borderRadius: 10,
    padding: 20,
  },
});

export default EstadosScreen;