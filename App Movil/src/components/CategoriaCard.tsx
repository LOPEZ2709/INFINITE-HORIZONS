import React from 'react';
import { View, Text, Image, TouchableOpacity, StyleSheet } from 'react-native';
import { useNavigation } from '@react-navigation/native';
import { NativeStackNavigationProp } from '@react-navigation/native-stack';


export type RootStackParamList = {
  Home: undefined;
  Hoteles: undefined;
  Restaurantes: undefined;
  Sitios: undefined;
  Itinerario: undefined;
  Estados: undefined
};

export type Props = {
  item: {
    id: string;
    nombre: string;
    imagen: any;
    destino: keyof RootStackParamList;
  };
};

const CategoriaCard: React.FC<Props> = ({ item }) => {
  const navigation = useNavigation<NativeStackNavigationProp<RootStackParamList>>();

  const handlePress = () => {
    
    console.log(`Navegando a: ${item.destino}`);
    navigation.navigate(item.destino);
  };

  return (
    <TouchableOpacity
      style={styles.card}
      onPress={handlePress}
      activeOpacity={0.7}
    >
      <Image 
        source={item.imagen} 
        style={styles.image} 
        accessibilityLabel={`Imagen de ${item.nombre}`}
      />
      <View style={styles.textContainer}>
        <Text style={styles.name} numberOfLines={1}>
          {item.nombre}
        </Text>
        <Text style={styles.action}>VER</Text>
      </View>
    </TouchableOpacity>
  );
};

const styles = StyleSheet.create({
  card: {
    width: '45%',
    backgroundColor: '#fff',
    borderRadius: 12,
    marginBottom: 16,
    overflow: 'hidden',
    elevation: 3,
    shadowColor: '#2d508e',
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
    color: '#000',
    flexShrink: 1,
  },
  action: {
    fontSize: 14,
    color: '#0846b1',
    fontWeight: 'bold',
    marginLeft: 8,
  },
});

export default CategoriaCard;