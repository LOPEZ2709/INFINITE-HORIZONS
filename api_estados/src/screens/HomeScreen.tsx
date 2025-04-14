import React from 'react';
import { View, ScrollView, StyleSheet, Text, Image } from 'react-native';
import CategoriaCard from '../components/CategoriaCard';

const HomeScreen = () => {
  const categorias = [
    {
      id: '1',
      nombre: 'HOTELES',
      imagen: require('../assets/hoteles.png'),
      screenName: 'Hoteles' as const, 
    },
    {
      id: '2',
      nombre: 'RESTAURANTES',
      imagen: require('../assets/restaurantes.png'),
      screenName: 'Restaurantes' as const,
    },
    {
      id: '3',
      nombre: 'SITIOS TURÍSTICOS',
      imagen: require('../assets/Monserrate.png'),
      screenName: 'SitiosTuristicos' as const,
    },
    {
      id: '4',
      nombre: 'ITINERARIO',
      imagen: require('../assets/itinerario.png'),
      screenName: 'Itinerario' as const,
    },
    {
      id: '5',
      nombre: 'estados',
      imagen: require('../assets/itinerario.png'),
      screenName: 'Estados' as const,
    },
  ];

  return (
    <View style={styles.container}>
      <View style={styles.header}>
        <Image 
          source={require('../assets/LOGODES.png')} 
          style={styles.logo} 
          resizeMode="contain"
        />
        <Text style={styles.headerTitle}>¿QUÉ QUIERES VER HOY?</Text>
      </View>

      <ScrollView 
        contentContainerStyle={styles.scrollContainer}
        showsVerticalScrollIndicator={false}
      >
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
    backgroundColor: '#f8f9fa',
  },
  header: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'center',
    paddingVertical: 20,
    backgroundColor: '#fff',
    elevation: 3,
    shadowColor: '#000',
    shadowOpacity: 0.1,
    shadowOffset: { width: 0, height: 2 },
    shadowRadius: 4,
    marginBottom: 10,
  },
  logo: {
    width: 50,
    height: 50,
    marginRight: 12,
  },
  headerTitle: {
    fontSize: 20,
    fontWeight: 'bold',
    color: '#388276',
  },
  scrollContainer: {
    flexGrow: 1,
    paddingTop: 10,
    paddingBottom: 30,
    paddingHorizontal: 16,
  },
  gridContainer: {
    flexDirection: 'row',
    flexWrap: 'wrap',
    justifyContent: 'space-between',
  },
});

export default HomeScreen;