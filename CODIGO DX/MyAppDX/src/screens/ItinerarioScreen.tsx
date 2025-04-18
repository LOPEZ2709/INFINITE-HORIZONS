import React, { useState } from 'react';
import { View, Text, TouchableOpacity, TextInput, StyleSheet, Image, Alert } from 'react-native';
import { Calendar } from 'react-native-calendars';
import { useNavigation } from '@react-navigation/native';

const ItinerarioScreen = () => {
  const navigation = useNavigation();
  const [selectedDate, setSelectedDate] = useState<string>('');
  const [events, setEvents] = useState<{[key: string]: string[]}>({});
  const [newEvent, setNewEvent] = useState<string>('');

  const handleDayPress = (day: {dateString: string}) => {
    setSelectedDate(day.dateString);
  };

  const addEvent = () => {
    if (selectedDate && newEvent.trim()) {
      setEvents(prev => ({
        ...prev,
        [selectedDate]: [...(prev[selectedDate] || []), newEvent.trim()]
      }));
      setNewEvent('');
    }
  };

  const removeEvent = (date: string, index: number) => {
    setEvents(prev => {
      const newEvents = {...prev};
      newEvents[date] = newEvents[date].filter((_, i) => i !== index);
      if (newEvents[date].length === 0) delete newEvents[date];
      return newEvents;
    });
  };

  const clearDay = () => {
    if (!selectedDate || !events[selectedDate]) return;
    
    Alert.alert(
      'Limpiar día',
      '¿Borrar todos los eventos de este día?',
      [
        {text: 'Cancelar', style: 'cancel'},
        {text: 'Limpiar', onPress: () => {
          setEvents(prev => {
            const newEvents = {...prev};
            delete newEvents[selectedDate];
            return newEvents;
          });
        }}
      ]
    );
  };

  return (
    <View style={styles.container}>
      <View style={styles.header}>
        <Image 
          source={require('../../assets/LOGODES.png')} 
          style={styles.logo} 
          resizeMode="contain"
        />
        <Text style={styles.title}>ITINERARIO</Text>
      </View>

      <Calendar
        onDayPress={handleDayPress}
        markedDates={{
          ...Object.keys(events).reduce((acc, date) => {
            acc[date] = {marked: true, dotColor: '#0363b4'};
            return acc;
          }, {} as {[key: string]: {marked: boolean; dotColor: string}}),
          [selectedDate]: {selected: true, selectedColor: '#0363b4'}
        }}
        theme={{
          selectedDayBackgroundColor: '#0363b4',
          todayTextColor: '#0363b4',
          arrowColor: '#0363b4',
        }}
        style={styles.calendar}
      />

      <View style={styles.eventsBox}>
        <View style={styles.sectionHeader}>
          <Text style={styles.dateTitle}>
            {selectedDate ? new Date(selectedDate).toLocaleDateString('es-ES', {
              weekday: 'long',
              year: 'numeric',
              month: 'long',
              day: 'numeric'
            }) : 'Selecciona un día'}
          </Text>
          
          {selectedDate && events[selectedDate] && (
            <TouchableOpacity 
              onPress={clearDay} 
              style={styles.clearButton}
            >
              <Text style={styles.clearButtonText}>Limpiar día</Text>
            </TouchableOpacity>
          )}
        </View>

        {selectedDate && events[selectedDate]?.map((event, i) => (
          <View key={`${selectedDate}-${i}`} style={styles.eventRow}>
            <Text style={styles.eventText}>• {event}</Text>
            <TouchableOpacity onPress={() => removeEvent(selectedDate, i)}>
              <Text style={styles.deleteBtn}>✕</Text>
            </TouchableOpacity>
          </View>
        ))}

        <View style={styles.addBox}>
          <TextInput
            value={newEvent}
            onChangeText={setNewEvent}
            placeholder="Añade un evento..."
            placeholderTextColor="#134d75"
            style={styles.input}
            onSubmitEditing={addEvent}
          />
          <TouchableOpacity 
            onPress={addEvent} 
            style={styles.addBtn}
            disabled={!newEvent.trim()}
          >
            <Text style={styles.addText}>+</Text>
          </TouchableOpacity>
        </View>
      </View>
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#f8f9fa',
    padding: 16,
    paddingTop: 60
  },
  header: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'center',
    marginBottom: 20
  },
  logo: {
    width: 48,
    height: 48,
    marginRight: 12,
    backgroundColor: '#fff',
    borderRadius: 20, // bordes redondeados para estilo moderno
  },
  title: {
    fontSize: 24,
    fontWeight: 'bold',
    color: '#000'
  },
  calendar: {
    marginBottom: 20,
    borderRadius: 12,
    overflow: 'hidden',
    elevation: 3,
    shadowColor: '#005cff',
    shadowOpacity: 0.1,
    shadowRadius: 4,
    shadowOffset: { width: 0, height: 2 }
  },
  eventsBox: {
    backgroundColor: '#fff',
    borderRadius: 12,
    padding: 16,
    elevation: 3,
    shadowColor: '#005cff',
    shadowOpacity: 0.1,
    shadowRadius: 4,
    shadowOffset: { width: 0, height: 2 }
  },
  sectionHeader: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center',
    marginBottom: 12,
    paddingBottom: 8,
    borderBottomWidth: 1,
    borderBottomColor: '#0087ff'
  },
  dateTitle: {
    fontWeight: '600',
    fontSize: 16,
    color: '#000000',
    flex: 1
  },
  clearButton: {
    backgroundColor: '#0087ff',
    paddingVertical: 6,
    paddingHorizontal: 12,
    borderRadius: 6
  },
  clearButtonText: {
    color: 'white',
    fontWeight: '500',
    fontSize: 14
  },
  eventRow: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center',
    paddingVertical: 10,
    borderBottomWidth: 1,
    borderBottomColor: '#8aa7bd'
  },
  eventText: {
    flex: 1,
    fontSize: 16,
    color: '#333'
  },
  deleteBtn: {
    color: '#e74c3c',
    fontSize: 18,
    paddingHorizontal: 10
  },
  addBox: {
    flexDirection: 'row',
    marginTop: 16,
    alignItems: 'center'
  },
  input: {
    flex: 1,
    borderWidth: 1,
    borderColor: '#ddd',
    borderRadius: 8,
    padding: 12,
    marginRight: 10,
    fontSize: 16,
    color: '#333',
    backgroundColor: '#f9f9f9'
  },
  addBtn: {
    backgroundColor: '#0087ff',
    width: 50,
    height: 50,
    borderRadius: 25,
    justifyContent: 'center',
    alignItems: 'center',
    opacity: 1
  },
  addText: {
    color: 'white',
    fontSize: 24,
    fontWeight: 'bold',
    marginBottom: 2
  }
});

export default ItinerarioScreen;