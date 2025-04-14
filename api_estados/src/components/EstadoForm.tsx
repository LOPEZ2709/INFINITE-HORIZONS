import React, { useState } from 'react';
import { View, TextInput, TouchableOpacity, Text, StyleSheet } from 'react-native';

interface EstadoFormProps {
  onSubmit: (desc_estado: string) => void;
  initialValue?: string;
  isEditing?: boolean;
  onCancel?: () => void;
}

const EstadoForm: React.FC<EstadoFormProps> = ({ 
  onSubmit, 
  initialValue = '', 
  isEditing = false,
  onCancel = () => {}
}) => {
  const [desc_estado, setDescEstado] = useState(initialValue);

  const handleSubmit = () => {
    if (desc_estado.trim()) {
      onSubmit(desc_estado);
      if (!isEditing) {
        setDescEstado('');
      }
    }
  };

  return (
    <View style={styles.formContainer}>
      <TextInput
        style={styles.input}
        value={desc_estado}
        onChangeText={setDescEstado}
        placeholder="Descripción del estado"
        placeholderTextColor="#999"
      />
      <View style={styles.buttonGroup}>
  <TouchableOpacity 
    style={[styles.button, styles.cancelButton]}
    onPress={onCancel}
  >
    <Text style={styles.buttonText}>Cancelar</Text>
  </TouchableOpacity>
  
  <TouchableOpacity 
    style={[styles.button, styles.submitButton]}
    onPress={handleSubmit}
  >
    <Text style={styles.buttonText}>
      {isEditing ? 'Actualizar' : 'Agregar'}
    </Text>
  </TouchableOpacity>
</View>
    </View>
  );
};

const styles = StyleSheet.create({
  formContainer: {
    backgroundColor: '#fff',
    borderRadius: 8,
    padding: 16,
    marginBottom: 16,
    elevation: 3,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.1,
    shadowRadius: 4,
  },
  input: {
    borderWidth: 1,
    borderColor: '#ddd',
    borderRadius: 4,
    padding: 12,
    marginBottom: 12,
    fontSize: 16,
    color: '#333',
  },
  buttonGroup: {
    flexDirection: 'row',
    justifyContent: 'flex-end',
  },
  button: {
    paddingVertical: 8,
    paddingHorizontal: 16,
    borderRadius: 4,
    marginLeft: 8,
  },
  submitButton: {
    backgroundColor: '#388276',
  },
  cancelButton: {
    backgroundColor: '#95a5a6',
  },
  buttonText: {
    color: '#fff',
    fontSize: 14,
    fontWeight: '500',
  },
});

export default EstadoForm;