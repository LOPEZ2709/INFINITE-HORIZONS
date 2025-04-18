import { createNativeStackNavigator } from '@react-navigation/native-stack';
import HomeScreen from '../screens/HomeScreen';
import ItinerarioScreen from '../screens/ItinerarioScreen';
import HotelesScreen from '../screens/HotelesScreen';
import RestaurantesScreen from '../screens/RestaurantesScreen';
import SitiosScreen from '../screens/SitiosScreen';
import EstadosScreen from '../screens/EstadosScreen';

const Stack = createNativeStackNavigator();

function AppNavigator() {
  return (
    <Stack.Navigator initialRouteName="Home">
      <Stack.Screen 
        name="Home" 
        component={HomeScreen}
        options={{ headerShown: false }}
      />
      <Stack.Screen
        name="Itinerario"
        component={ItinerarioScreen}
        options={{ title: 'Mi Itinerario' }}
      />
      <Stack.Screen
        name="Hoteles"
        component={HotelesScreen}
        options={{ title: 'Hoteles' }}
      />
      <Stack.Screen
        name="Restaurantes"
        component={RestaurantesScreen}
        options={{ title: 'Restaurantes' }}
      />
      <Stack.Screen
        name="Sitios"
        component={SitiosScreen}
        options={{ title: 'Sitios Turísticos' }}
      />
      <Stack.Screen
        name="Estados"
        component={EstadosScreen}
        options={{ title: 'estados' }}
      />
    </Stack.Navigator>
  );
}

export default AppNavigator;