import { View, Text, StyleSheet, Image, ScrollView } from 'react-native';
import React, { useEffect, useState } from 'react';

const RestaurantesScreen = () => {
  const [restaurantes, setRestaurantes] = useState<any[]>([]);
  const [expandedCards, setExpandedCards] = useState<number[]>([]); // 👈 Para manejar "Ver más"

  useEffect(() => {
    const fetchRestaurante = async () => {
      try {
        const response = await fetch('http://192.168.10.13/api_hoteles/restauranteAPI.php');
        const data = await response.json();
        setRestaurantes(data);
      } catch (error) {
        console.error("Error al cargar Restaurantes:", error);
      }
    };

    fetchRestaurante();
  }, []);

  const toggleCard = (id: number) => {
    if (expandedCards.includes(id)) {
      setExpandedCards(expandedCards.filter(i => i !== id));
    } else {
      setExpandedCards([...expandedCards, id]);
    }
  };

  return (
    <View style={styles.container}>
      <View style={styles.header}>
        <Image 
          source={require('../../assets/LOGODES.png')} 
          style={styles.logo} 
          resizeMode="contain"
        />
        <Text style={styles.headerTitle}>RESTAURANTES RECOMENDADOS</Text>
      </View>

      <ScrollView contentContainerStyle={styles.content}>
        <View style={styles.placeholder}>
          <Text style={styles.descriptiontext}>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi harum corporis commodi, veniam aperiam voluptate impedit molestiae modi vitae quo suscipit, qui earum labore fugiat possimus quidem ex, deserunt repellat!
          </Text>
        </View>

        <View style={styles.cardsContainer}> 
          {restaurantes.map((restaurante) => (
           <View key={restaurante.id_restaurante} style={styles.card}>
           <Image
             source={{ uri: `http://192.168.10.13/api_hoteles/imagenes/${restaurante.img}` }}
             style={styles.cardImageHorizontal}
           />
           <View style={styles.cardInfo}>
             <Text style={styles.cardTitle}>{restaurante.titulo_restaurante}</Text>
         
             {/* Descripción con "ver más" funcional */}
             {expandedCards.includes(restaurante.id_restaurante) ? (
               <Text style={styles.cardDescription}>{restaurante.desc_restaurantes}</Text>
             ) : (
               <Text numberOfLines={2} style={styles.cardDescription}>
                 {restaurante.desc_restaurantes}
               </Text>
             )}
         
             <Text
               style={styles.toggleText}
               onPress={() => toggleCard(restaurante.id_restaurante)}
             >
               {expandedCards.includes(restaurante.id_restaurante) ? 'Ver menos' : 'Ver más'}
             </Text>
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
    gap: 12,
    marginBottom: 6,
    flexWrap: 'wrap',
  },
  cardImageHorizontal: {
    width: 100,
    height: 100,
    borderRadius: 10,
    resizeMode: 'cover',
  },
  cardInfo: {
    flex: 1,
    justifyContent: 'flex-start',
    flexShrink: 1,
    flexGrow: 1,
    minWidth: 0,
  },
  cardTitle: {
    fontSize: 16,
    fontWeight: 'bold',
    color: '#1f2937',
  },
  cardDescription: {
    fontSize: 13,
    color: '#374151',
    textAlign: 'justify',
    flexShrink: 1,
    flexWrap: 'wrap',
  },
  toggleText: {
    color: '#007BFF',
    marginTop: 4,
    fontSize: 13,
    fontWeight: '500',
  },
});

export default RestaurantesScreen;
