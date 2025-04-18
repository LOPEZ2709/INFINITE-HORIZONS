import React from 'react';
import { View, ScrollView, StyleSheet, Text, Image } from 'react-native';
import CategoriaCard from '../components/CategoriaCard';
import { RootStackParamList } from '../components/CategoriaCard';
import type {Props} from '../components/CategoriaCard';


const HomeScreen = () => {
  const categorias: Props['item'][] = [
    {
      id: '1',
      nombre: 'HOTELES',
      imagen: require('../../assets/hoteles.png'),
      destino: 'Hoteles',
    },
    {
      id: '2',
      nombre: 'RESTAURANTES',
      imagen: require('../../assets/restaurantes.png'),
      destino: 'Restaurantes'
    },
    {
      id: '3',
      nombre: 'SITIOS',
      imagen: require('../../assets/Monserrate.png'),
      destino: 'Sitios'
    },
    {
      id: '4',
      nombre: 'ITINERARIO',
      imagen: require('../../assets/itinerario.png'),
      destino: 'Itinerario'
    },
    {
      id: '5',
      nombre: 'ESTADOS',
      imagen: require('../../assets/drex_usuarios_y_perfiles_custom.png'),
      destino: 'Estados'
    }
  ];

  return (
    <View style={styles.container}>
      <View style={styles.header}>
        <Image 
          source={require('../../assets/LOGODES.png')} 
          style={styles.logo} 
          resizeMode="contain"
        />
        <Text style={styles.headerTitle}>¿QUÉ QUIERES VER HOY?</Text>
      </View>

      <ScrollView contentContainerStyle={styles.scrollContainer}>
        <View style={styles.gridContainer}>
          {categorias.map((item) => (
            <CategoriaCard key={item.id} item={item} />
          ))}
        </View>
      </ScrollView>
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#f2f4f7', // un gris más suave y moderno
  },
  header: {
    flexDirection: 'row',
    alignItems: 'center',
    paddingTop: 60,
    paddingBottom: 20,
    paddingHorizontal: 24,
    backgroundColor: '#ffffff',
    justifyContent: 'space-between',
    elevation: 4,
    shadowColor: '#000000',
    shadowOpacity: 0.08,
    shadowOffset: { width: 0, height: 2 },
    shadowRadius: 6,
    borderBottomWidth: 1,
    borderBottomColor: '#e0e0e0',
  },
  logo: {
    width: 48,
    height: 48,
    marginRight: 12,
    backgroundColor: '#fff',
    borderRadius: 20, // bordes redondeados para estilo moderno
  },
  headerTitle: {
    fontSize: 24,
    fontWeight: '700',
    color: '#1f2937', // gris oscuro elegante
  },
  scrollContainer: {
    flexGrow: 1,
    paddingTop: 24,
    paddingBottom: 80,
  },
  gridContainer: {
    flexDirection: 'row',
    flexWrap: 'wrap',
    justifyContent: 'center',
    gap: 20,
    paddingHorizontal: 20,
  },
});

export default HomeScreen;