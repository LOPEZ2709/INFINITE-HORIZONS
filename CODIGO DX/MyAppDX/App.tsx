import React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import HomeScreen from './src/screens/HomeScreen';
import HotelesScreen from './src/screens/HotelesScreen';
import RestaurantesScreen from './src/screens/RestaurantesScreen';
import SitiosScreen from './src/screens/SitiosScreen';
import ItinerarioScreen from './src/screens/ItinerarioScreen';
import EstadosScreen from './src/screens/EstadosScreen'


// Define los parámetros de tu navegación
export type RootStackParamList = {
  Home: undefined;
  Hoteles: undefined;
  Restaurantes: undefined;
  Sitios: undefined;
  Itinerario: undefined;
  Estados: undefined;
};

const Stack = createNativeStackNavigator<RootStackParamList>();

const App = () => {
  return (
    <NavigationContainer>
      <Stack.Navigator initialRouteName="Home">
        {/* Pantalla principal sin header */}
        <Stack.Screen 
          name="Home" 
          component={HomeScreen} 
          options={{ headerShown: false }} 
        />
        
        {/* Pantallas secundarias con header personalizado */}
        <Stack.Screen
          name="Hoteles"
          component={HotelesScreen}
          options={{ 
            title: 'Hoteles',
            headerStyle: {
              backgroundColor: '#0642ad',
            },
            headerTintColor: '#fff',
          }}
        />
        <Stack.Screen
          name="Restaurantes"
          component={RestaurantesScreen}
          options={{ 
            title: 'Restaurantes',
            headerStyle: {
              backgroundColor: '#0642ad',
            },
            headerTintColor: '#fff',
          }}
        />
        <Stack.Screen
          name="Sitios"
          component={SitiosScreen}
          options={{ 
            title: 'Sitios Turísticos',
            headerStyle: {
              backgroundColor: '#0642ad',
            },
            headerTintColor: '#fff',
          }}
        />
        <Stack.Screen
          name="Itinerario"
          component={ItinerarioScreen}
          options={{ 
            title: 'Mi Itinerario',
            headerStyle: {
              backgroundColor: '#0642ad',
            },
            headerTintColor: '#fff',
          }}
        />
        <Stack.Screen
          name="Estados"
          component={EstadosScreen}
          options={{ 
            title: 'Estado',
            headerStyle: {
              backgroundColor: '#0642ad',
            },
            headerTintColor: '#fff',
          }}
        />
      </Stack.Navigator>
    </NavigationContainer>
  );
};

export default App;
