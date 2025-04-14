import React from 'react';
import { View, Text, Image, TouchableOpacity, StyleSheet } from 'react-native';
import { useNavigation } from '@react-navigation/native';
import { StackNavigationProp } from '@react-navigation/stack';
import Swal from 'sweetalert2';

type RootStackParamList = {
  Inicio: undefined;
  Itinerario: undefined;
  Hoteles: undefined;
  Restaurantes: undefined;
  SitiosTuristicos: undefined;
  Estados: undefined;
};

type CategoriaCardNavigationProp = StackNavigationProp<RootStackParamList, 'Inicio'>;

interface CategoriaItem {
  id: string;
  nombre: string;
  imagen: any;
  screenName?: keyof RootStackParamList;
}                                     

interface CategoriaCardProps {
  item: CategoriaItem;
}

const CategoriaCard: React.FC<CategoriaCardProps> = ({ item }) => {
  const navigation = useNavigation<CategoriaCardNavigationProp>();

  const handlePress = () => {
    if (item.screenName) {
      navigation.navigate(item.screenName);
    } else {
      Swal.fire('Información', 'Esta funcionalidad estará disponible pronto', 'info');
    }
  };

  return (
    <TouchableOpacity
      style={styles.card}
      onPress={handlePress}
      activeOpacity={0.7}
    >
      <Image source={item.imagen} style={styles.image} />
      <View style={styles.textContainer}>
        <Text style={styles.name}>{item.nombre}</Text>
        <Text style={styles.action}>VER</Text>
      </View>
    </TouchableOpacity>
  );
};

const styles = StyleSheet.create({
  card: {
    width: '48%',
    backgroundColor: '#fff',
    borderRadius: 12,
    marginBottom: 16,
    overflow: 'hidden',
    elevation: 3,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.1,
    shadowRadius: 4,
  },
  image: {
    width: '100%',
    height: 120,
    resizeMode: 'cover',
  },
  textContainer: {
    padding: 12,
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center',
    backgroundColor: '#fff',
  },
  name: {
    fontSize: 16,
    fontWeight: '600',
    color: '#444',
    flexShrink: 1,
  },
  action: {
    fontSize: 14,
    color: '#388276',
    fontWeight: 'bold',
    marginLeft: 8,
  },
});

export default CategoriaCard;