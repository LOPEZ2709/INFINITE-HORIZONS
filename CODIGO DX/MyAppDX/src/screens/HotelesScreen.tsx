import { View, Text, StyleSheet, Image, ScrollView } from 'react-native';
import React, { useEffect, useState } from 'react';

const HotelesScreen = () => {
  const [hoteles, setHoteles] = useState<any[]>([]);

  useEffect(() => {
    const fetchHoteles = async () => {
      try {
        const response = await fetch('http://192.168.1.6/api_hoteles/hotelesAPI.php');
        const data = await response.json();
        setHoteles(data);
      } catch (error) {
        console.error("Error al cargar hoteles:", error);
      }
    };

    fetchHoteles();
  }, []);

  return (
    <View style={styles.container}>
      <View style={styles.header}>
        <Image 
          source={require('../../assets/LOGODES.png')} 
          style={styles.logo} 
          resizeMode="contain"
        />
        <Text style={styles.headerTitle}>HOTELES RECOMENDADOS</Text>
      </View>

      <ScrollView contentContainerStyle={styles.content}>
        <View style={styles.placeholder}>
          <Text style={styles.descriptiontext}>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi harum corporis commodi, veniam aperiam voluptate impedit molestiae modi vitae quo suscipit, qui earum labore fugiat possimus quidem ex, deserunt repellat!
          </Text>
        </View>

        <View style={styles.cardsContainer}> 
          {hoteles.map((hotel) => (
            <View key={hotel.id_hoteles} style={styles.card}>
              <Image
              source={{ uri: `http://192.168.1.6/api_hoteles/imagenes/${hotel.img}` }}
              style={styles.cardImageHorizontal}
            />
              <View style={styles.cardInfo}>
                <Text style={styles.cardTitle}>{hotel.titulo_hotel}</Text>
                <Text style={styles.cardSubtitle}>Calificación: {hotel.calificacion_id_calificacion}</Text>
                <Text style={styles.cardDescription}>{hotel.descripcion_hotel}</Text>
              </View>
            </View>
          ))}
        </View>

        <View style={styles.placeholder}>
          <Text style={styles.descriptiontext}>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi harum corporis commodi, veniam aperiam voluptate impedit molestiae modi vitae quo suscipit, qui earum labore fugiat possimus quidem ex, deserunt repellat!
          </Text>
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
  },
  logo: {
    width: 48,
    height: 48,
    marginRight: 12,
    backgroundColor: '#fff',
    borderRadius: 20, // bordes redondeados para estilo moderno
  },
  headerTitle: {
    fontSize: 20,
    fontWeight: 'bold',
    color: '#000',
  },
  content: {
    padding: 16,
    paddingBottom: 32, 
  },
  
  placeholder: {
    backgroundColor: '#fff',
    borderRadius: 12,
    padding: 20,
    alignItems: 'center',
    justifyContent: 'center',
    elevation: 2,
    marginBottom: 1,
  },
  descriptiontext:{
    color: '#000',
    fontSize: 17,
  },
  cardsContainer: {
    marginTop: 20,
    gap: 16,
    marginBottom:6,
  },
  card: {
    flexDirection: 'row',
    backgroundColor: '#fff',
    borderRadius: 12,
    padding: 12,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.1,
    shadowRadius: 4,
    elevation: 3,
    alignItems: 'center',
    gap: 12,
    marginBottom: 6,
  },
  
  cardImageHorizontal: {
  width: 80,
  height: 80,
  borderRadius: 10,
},

  
  cardInfo: {
    flex: 1,
    justifyContent: 'center',
  },
  
  cardTitle: {
    fontSize: 16,
    fontWeight: 'bold',
    color: '#1f2937',
  },
  
  cardSubtitle: {
    fontSize: 13,
    color: '#6b7280',
    marginBottom: 4,
  },
  
  cardDescription: {
    fontSize: 13,
    color: '#374151',
  },
});

export default HotelesScreen;