import React from 'react';
import { createStackNavigator } from '@react-navigation/stack';
import { NavigationContainer } from '@react-navigation/native';
import HomeScreen from './src/screens/HomeScreen';
import ItinerarioScreen from './src/screens/ItinerarioScreen';
import EstadosScreen from './src/screens/EstadosScreen'; 

const Stack = createStackNavigator();

const App = () => {
  return (
    <NavigationContainer>
      <Stack.Navigator>
        <Stack.Screen 
          name="Inicio" 
          component={HomeScreen} 
          options={{ headerShown: false }}
        />
        <Stack.Screen 
          name="Itinerario" 
          component={ItinerarioScreen} 
          options={{ 
            title: 'Mi Itinerario',
            headerStyle: { backgroundColor: '#388276' },
            headerTintColor: '#fff',
          }}
        />
        <Stack.Screen 
          name="Estados" 
          component={EstadosScreen} 
          options={{ 
            title: 'Gestión de Estados',
            headerStyle: { backgroundColor: '#388276' },
            headerTintColor: '#fff',
          }}
        />
       
      </Stack.Navigator>
    </NavigationContainer>
  );
};

export default App;