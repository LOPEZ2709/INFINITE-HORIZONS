import React from 'react';
import { View, Text, TouchableOpacity, StyleSheet, Alert } from 'react-native';
import MaterialIcons from 'react-native-vector-icons/MaterialIcons';

interface EstadoCardProps {
  estado: {
    id_estado: number;
    desc_estado: string;
  };
  onEdit: (id: number, desc: string) => void;
  onDelete: (id: number) => void;
}

const EstadoCard: React.FC<EstadoCardProps> = ({ estado, onEdit, onDelete }) => {
  const handleDelete = () => {
    Alert.alert(
      '¿Eliminar estado?',
      'Esta acción no se puede deshacer',
      [
        {
          text: 'Cancelar',
          style: 'cancel',
        },
        { 
          text: 'Confirmar', 
          onPress: () => onDelete(estado.id_estado),
          style: 'destructive'
        }
      ]
    );
  };

  return (
    <View style={styles.card}>
      <Text style={styles.descText}>{estado.desc_estado}</Text>
      
      <View style={styles.buttonsContainer}>
        <TouchableOpacity 
          style={styles.iconButton}
          onPress={() => onEdit(estado.id_estado, estado.desc_estado)}
        >
          <MaterialIcons name="edit" size={24} color="#388276" />
        </TouchableOpacity>
        
        <TouchableOpacity 
          style={styles.iconButton}
          onPress={handleDelete}
        >
          <MaterialIcons name="delete" size={24} color="#e74c3c" />
        </TouchableOpacity>
      </View>
    </View>
  );
};


const styles = StyleSheet.create({
  card: {
    backgroundColor: '#fff',
    borderRadius: 8,
    padding: 16,
    marginBottom: 12,
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center',
    elevation: 3,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.1,
    shadowRadius: 4,
  },
  descText: {
    fontSize: 16,
    color: '#333',
    flex: 1,
    marginRight: 10,
  },
  buttonsContainer: {
    flexDirection: 'row',
  },
  iconButton: {
    padding: 8,
    marginLeft: 10,
  },
});

export default EstadoCard;