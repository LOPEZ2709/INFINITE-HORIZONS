import { createNativeStackNavigator } from '@react-navigation/native-stack';
import HomeScreen from '../screens/HomeScreen';
import ItinerarioScreen from '../screens/ItinerarioScreen';
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
      /><Stack.Screen
      name="Estados"
      component={EstadosScreen}
      options={{ title: 'Mis Estados' }}
    />
      
    </Stack.Navigator>
  );
}

export default AppNavigator;