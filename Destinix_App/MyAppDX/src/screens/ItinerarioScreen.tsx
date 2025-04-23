import React, { useState, useEffect } from 'react';
import { View, Text, Modal, TextInput, FlatList, TouchableOpacity, StyleSheet, Image, Alert, ActivityIndicator } from 'react-native';
import { Calendar } from 'react-native-calendars';

const API_BASE_URL = 'http://192.168.10.12/api_itinerario';

const ItinerarioScreen = () => {
 
  const [selectedDate, setSelectedDate] = useState('');
  const [events, setEvents] = useState({});
  const [loading, setLoading] = useState(false);
 
  const [searchQuery, setSearchQuery] = useState('');
  const [searchResults, setSearchResults] = useState([]);
  const [selectedCategory, setSelectedCategory] = useState('restaurante');
  
 
  const [showSearchModal, setShowSearchModal] = useState(false);
  const [showDetailsModal, setShowDetailsModal] = useState(false);

  const [currentActivity, setCurrentActivity] = useState(null);
  const [descripcion, setDescripcion] = useState('');
  const [horaInicio, setHoraInicio] = useState('08:00');
  const [horaFin, setHoraFin] = useState('10:00');

  useEffect(() => {
    loadItinerario();
  }, []);


  const loadItinerario = async () => {
    setLoading(true);
    try {
      const response = await fetch(`${API_BASE_URL}/itinerario_API.php`);
      const data = await response.json();
      setEvents(formatEvents(data));
    } catch (error) {
      Alert.alert("Error", "No se pudo cargar el itinerario");
    } finally {
      setLoading(false);
    }
  };

  
  const formatEvents = (data) => {
    return data.reduce((acc, item) => {
      const date = item.fecha_itinerario;
      if (!date) return acc;
      
      if (!acc[date]) acc[date] = [];
      
      acc[date].push({
        id: item.id_itinerario,
        nombre: item.nombre_actividad || item.descripcion || 'Actividad sin nombre',
        tipo: item.tipo_actividad || 'otro',
        imagen: item.imagen_actividad,
        descripcion: item.descripcion,
        horaInicio: item.hora_inicio,
        horaFin: item.hora_fin
      });
      
      return acc;
    }, {});
  };

  
  const handleDayPress = (day) => {
    setSelectedDate(day.dateString);
    setShowSearchModal(true);
    setSearchQuery('');
    setSearchResults([]);
  };


  const handleSearch = async () => {
    if (!searchQuery.trim()) return;
    
    setLoading(true);
    try {
      const url = `${API_BASE_URL}/api_filtros.php?tipo=${selectedCategory}&filtros=${encodeURIComponent(searchQuery.trim())}`;
      const response = await fetch(url);
      const data = await response.json();
      setSearchResults(data.success && Array.isArray(data.data) ? data.data : []);
    } catch (error) {
      Alert.alert("Error", "No se pudieron cargar los resultados");
    } finally {
      setLoading(false);
    }
  };


  const prepareAddActivity = (item) => {
    setCurrentActivity(item);
    setDescripcion(`Visita a ${item.nombre}`);
    setShowSearchModal(false);
    setShowDetailsModal(true);
  };

  const confirmAddActivity = async () => {
    if (!selectedDate || !currentActivity) {
      Alert.alert("Error", "Faltan datos obligatorios");
      return;
    }
    
    // Validaciones de formato
    if (!/^\d{4}-\d{2}-\d{2}$/.test(selectedDate)) {
      Alert.alert("Error", "Formato de fecha inválido. Use YYYY-MM-DD");
      return;
    }
    
    if (!/^\d{2}:\d{2}$/.test(horaInicio) || !/^\d{2}:\d{2}$/.test(horaFin)) {
      Alert.alert("Error", "Formato de hora debe ser HH:MM");
      return;
    }
    
    setLoading(true);
    
    try {
      const bodyData = {
        persona_id_persona: 1,
        fecha_itinerario: selectedDate,
        descripcion: descripcion,
        hora_inicio: `${horaInicio}:00`,
        hora_fin: `${horaFin}:00`,
        estado_id_estado: 1,
        [selectedCategory === 'restaurante' ? 'id_restaurante' : 
         selectedCategory === 'hotel' ? 'id_hoteles' : 'id_sitio']: currentActivity.id
      };

      await fetch(`${API_BASE_URL}/itinerario_API.php`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(bodyData)
      });
      
      await loadItinerario();
      setShowDetailsModal(false);
      Alert.alert('Éxito', 'Actividad añadida correctamente');
    } catch (error) {
      Alert.alert("Error", "No se pudo añadir la actividad");
    } finally {
      setLoading(false);
    }
  };

  const removeEvent = async (date, index) => {
    if (!events[date]?.[index]) return;
    
    setLoading(true);
    try {
      const activityId = events[date][index].id;
      await fetch(`${API_BASE_URL}/itinerario_API.php`, {
        method: 'DELETE',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id_itinerario: activityId })
      });
      
    
      const updatedEvents = {...events};
      updatedEvents[date] = updatedEvents[date].filter((_, i) => i !== index);
      if (updatedEvents[date].length === 0) delete updatedEvents[date];
      setEvents(updatedEvents);
    } catch (error) {
      Alert.alert("Error", "No se pudo eliminar la actividad");
    } finally {
      setLoading(false);
    }
  };

  const clearDay = () => {
    if (!selectedDate || !events[selectedDate]) return;
    
    Alert.alert(
      'Limpiar día',
      '¿Borrar todos los eventos de este día?',
      [
        {text: 'Cancelar', style: 'cancel'},
        {text: 'Limpiar', onPress: async () => {
          setLoading(true);
          try {
            await Promise.all(
              events[selectedDate].map(activity => 
                fetch(`${API_BASE_URL}/itinerario_API.php`, {
                  method: 'DELETE',
                  body: JSON.stringify({ id_itinerario: activity.id })
                })
              )
            );
            
            const newEvents = {...events};
            delete newEvents[selectedDate];
            setEvents(newEvents);
          } catch (error) {
            Alert.alert("Error", "No se pudo limpiar el día");
          } finally {
            setLoading(false);
          }
        }}
      ]
    );
  };

  const formatDate = (dateString) => dateString ? new Date(dateString).toLocaleDateString('es-ES', {
    weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
  }) : 'Selecciona un día';

  const formatTime = (timeString) => timeString?.substring(0, 5) || '';

  return (
    <View style={styles.container}>
      {/* Header */}
      <View style={styles.header}>
        <Image source={require('../../assets/LOGODES.png')} style={styles.logo} resizeMode="contain" />
        <Text style={styles.title}>ITINERARIO</Text>
      </View>

      {/* Calendario */}
      <Calendar
        onDayPress={handleDayPress}
        markedDates={{
          ...Object.keys(events).reduce((acc, date) => ({
            ...acc, [date]: {marked: true, dotColor: '#0363b4'}
          }), {}),
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
          <Text style={styles.dateTitle}>{formatDate(selectedDate)}</Text>
          {selectedDate && events[selectedDate] && (
            <TouchableOpacity onPress={clearDay} style={styles.clearButton} disabled={loading}>
              <Text style={styles.clearButtonText}>Limpiar día</Text>
            </TouchableOpacity>
          )}
        </View>

        {selectedDate && events[selectedDate]?.map((event, i) => (
          <View key={`${selectedDate}-${i}`} style={styles.eventItem}>
            {event.imagen && (
              <Image source={{ uri: `${API_BASE_URL}/${event.imagen}` }} style={styles.eventImage} />
            )}
            <View style={styles.eventDetails}>
              <Text style={styles.eventName}>{event.nombre} ({event.tipo.toUpperCase()})</Text>
              <Text style={styles.eventTime}>
                {formatTime(event.horaInicio)} - {formatTime(event.horaFin)}
              </Text>
              {event.descripcion && (
                <Text style={styles.eventDescription} numberOfLines={2}>{event.descripcion}</Text>
              )}
            </View>
            <TouchableOpacity onPress={() => removeEvent(selectedDate, i)} disabled={loading}>
              <Text style={styles.deleteBtn}>✕</Text>
            </TouchableOpacity>
          </View>
        ))}

        {loading && (
          <View style={styles.loadingContainer}>
            <ActivityIndicator size="small" color="#0363b4" />
            <Text style={styles.loadingText}>Cargando...</Text>
          </View>
        )}
      </View>

      <Modal visible={showSearchModal} animationType="slide">
        <View style={styles.modalContainer}>
          <Text style={styles.modalTitle}>Agregar actividad para: {selectedDate}</Text>
          
          
          <View style={styles.categorySelector}>
            {['restaurante', 'hotel', 'sitio'].map((cat) => (
              <TouchableOpacity 
                key={cat} 
                style={[
                  styles.categoryButton,
                  selectedCategory === cat && styles.categoryButtonActive
                ]}
                onPress={() => {
                  setSelectedCategory(cat);
                  setSearchResults([]);
                  setSearchQuery('');
                }}
                disabled={loading}
              >
                <Text style={[
                  styles.categoryButtonText,
                  selectedCategory === cat && styles.categoryButtonTextActive
                ]}>
                  {cat.toUpperCase()}
                </Text>
              </TouchableOpacity>
            ))}
          </View>

          <View style={styles.searchContainer}>
            <TextInput
              placeholder={`Buscar ${selectedCategory}s...`}
              value={searchQuery}
              onChangeText={setSearchQuery}
              onSubmitEditing={handleSearch}
              style={styles.searchInput}
              placeholderTextColor="#888"
              editable={!loading}
            />
            <TouchableOpacity 
              style={[styles.searchButton, (loading || !searchQuery.trim()) && styles.disabledButton]}
              onPress={handleSearch}
              disabled={loading || !searchQuery.trim()}
            >
              <Text style={styles.searchButtonText}>BUSCAR</Text>
            </TouchableOpacity>
          </View>

       
          {loading ? (
            <View style={styles.loadingContainer}>
              <ActivityIndicator size="large" color="#0363b4" />
              <Text style={styles.loadingText}>Buscando...</Text>
            </View>
          ) : searchResults.length > 0 ? (
            <FlatList
              data={searchResults}
              keyExtractor={(item) => item.id.toString()}
              renderItem={({ item }) => (
                <View style={styles.resultItem}>
                  {item.img && (
                    <Image source={{ uri: `${API_BASE_URL}/${item.img}` }} style={styles.resultImage} />
                  )}
                  <View style={styles.resultTextContainer}>
                    <Text style={styles.resultTitle}>{item.nombre}</Text>
                    <Text style={styles.resultDescription} numberOfLines={2}>
                      {item.descripcion || 'Sin descripción'}
                    </Text>
                  </View>
                  <TouchableOpacity 
                    style={styles.addButton}
                    onPress={() => prepareAddActivity(item)}
                    disabled={loading}
                  >
                    <Text style={styles.addButtonText}>AÑADIR</Text>
                  </TouchableOpacity>
                </View>
              )}
            />
          ) : (
            <View style={styles.noResultsContainer}>
              <Image source={require('../../assets/casa.png')} style={styles.noResultsImage} />
              <Text style={styles.noResultsText}>
                {searchQuery 
                  ? 'No se encontraron resultados para tu búsqueda' 
                  : `Selecciona una categoría y busca ${selectedCategory}s`}
              </Text>
            </View>
          )}

        
          <TouchableOpacity 
            style={styles.closeButton}
            onPress={() => setShowSearchModal(false)}
            disabled={loading}
          >
            <Text style={styles.closeButtonText}>CERRAR</Text>
          </TouchableOpacity>
        </View>
      </Modal>

      
      <Modal visible={showDetailsModal} animationType="slide">
        <View style={styles.modalContainer}>
          <Text style={styles.modalTitle}>Detalles de la actividad</Text>
          
          <View style={styles.inputGroup}>
            <Text style={styles.label}>Hora de inicio:</Text>
            <TextInput
              style={styles.input}
              value={horaInicio}
              onChangeText={setHoraInicio}
              placeholder="HH:MM"
              keyboardType="numeric"
            />
          </View>

          <View style={styles.inputGroup}>
            <Text style={styles.label}>Hora de fin:</Text>
            <TextInput
              style={styles.input}
              value={horaFin}
              onChangeText={setHoraFin}
              placeholder="HH:MM"
              keyboardType="numeric"
            />
          </View>

          <View style={styles.inputGroup}>
            <Text style={styles.label}>Descripción:</Text>
            <TextInput
              style={[styles.input, styles.multilineInput]}
              value={descripcion}
              onChangeText={setDescripcion}
              placeholder="Descripción detallada"
              multiline
            />
          </View>

          <View style={styles.buttonRow}>
            <TouchableOpacity 
              style={[styles.actionButton, styles.cancelButton]}
              onPress={() => setShowDetailsModal(false)}
            >
              <Text style={styles.buttonText}>Cancelar</Text>
            </TouchableOpacity>
            
            <TouchableOpacity 
              style={[styles.actionButton, styles.confirmButton]}
              onPress={confirmAddActivity}
              disabled={loading}
            >
              <Text style={styles.buttonText}>Confirmar</Text>
            </TouchableOpacity>
          </View>
        </View>
      </Modal>
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
  },
  header: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'center',
    padding: 15,
    backgroundColor: 'transparent',
  },
  logo: {
    width: 50,
    height: 50,
    marginRight: 10,
  },
  title: {
    fontSize: 24,
    fontWeight: 'bold',
    color: '#000',
  },
  calendar: {
    marginBottom: 10,
    borderWidth: 1,
    borderColor: '#ddd',
    borderRadius: 10,
    margin: 10,
  },
  eventsBox: {
    flex: 1,
    padding: 15,
  },
  sectionHeader: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center',
    marginBottom: 15,
  },
  dateTitle: {
    fontSize: 18,
    fontWeight: 'bold',
  },
  clearButton: {
    backgroundColor: '#ff4444',
    padding: 8,
    borderRadius: 5,
  },
  clearButtonText: {
    color: '#fff',
    fontSize: 14,
  },
  eventItem: {
    flexDirection: 'row',
    alignItems: 'center',
    padding: 10,
    borderBottomWidth: 1,
    borderColor: '#eee',
    marginBottom: 10,
  },
  eventImage: {
    width: 50,
    height: 50,
    borderRadius: 25,
    marginRight: 10,
  },
  eventDetails: {
    flex: 1,
  },
  eventName: {
    fontSize: 16,
    fontWeight: 'bold',
  },
  eventTime: {
    fontSize: 14,
    color: '#666',
  },
  eventDescription: {
    fontSize: 14,
    color: '#666',
    marginTop: 4,
  },
  deleteBtn: {
    color: 'red',
    fontSize: 20,
    padding: 10,
  },
  loadingContainer: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    padding: 20,
  },
  loadingText: {
    marginTop: 10,
    color: 'white',
  },
  modalContainer: {
    flex: 1,
    padding: 20,
    backgroundColor: '#fff',
  },
  modalTitle: {
    fontSize: 20,
    fontWeight: 'bold',
    marginBottom: 20,
    textAlign: 'center',
  },
  categorySelector: {
    flexDirection: 'row',
    justifyContent: 'space-around',
    marginBottom: 20,
  },
  categoryButton: {
    padding: 10,
    borderRadius: 5,
    backgroundColor: '#eee',
  },
  categoryButtonActive: {
    backgroundColor: '#0363b4',
  },
  categoryButtonText: {
    color: '#000',
  },
  categoryButtonTextActive: {
    color: '#fff',
  },
  searchContainer: {
    flexDirection: 'row',
    marginBottom: 20,
  },
  searchInput: {
    flex: 1,
    borderWidth: 1,
    borderColor: '#ccc',
    borderRadius: 5,
    padding: 10,
    marginRight: 10,
  },
  searchButton: {
    backgroundColor: '#0363b4',
    padding: 10,
    borderRadius: 5,
    justifyContent: 'center',
  },
  disabledButton: {
    backgroundColor: '#ccc',
  },
  searchButtonText: {
    color: '#fff',
    fontWeight: 'bold',
  },
  resultItem: {
    flexDirection: 'row',
    padding: 15,
    borderBottomWidth: 1,
    borderColor: '#eee',
    alignItems: 'center',
  },
  resultImage: {
    width: 50,
    height: 50,
    borderRadius: 25,
    marginRight: 10,
  },
  resultTextContainer: {
    flex: 1,
  },
  resultTitle: {
    fontWeight: 'bold',
    fontSize: 16,
  },
  resultDescription: {
    color: '#666',
    fontSize: 14,
  },
  addButton: {
    backgroundColor: '#0363b4',
    padding: 10,
    borderRadius: 5,
  },
  addButtonText: {
    color: '#fff',
    fontWeight: 'bold',
  },
  noResultsContainer: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    padding: 20,
  },
  noResultsImage: {
    width: 100,
    height: 100,
    marginBottom: 20,
    opacity: 0.5,
  },
  noResultsText: {
    color: '#666',
    textAlign: 'center',
    fontSize: 16,
  },
  closeButton: {
    backgroundColor: '#ccc',
    padding: 15,
    borderRadius: 5,
    marginTop: 20,
    alignItems: 'center',
  },
  closeButtonText: {
    color: '#000',
    fontWeight: 'bold',
  },
  inputGroup: {
    marginBottom: 15,
  },
  label: {
    marginBottom: 5,
    fontWeight: 'bold',
  },
  input: {
    borderWidth: 1,
    borderColor: '#ccc',
    borderRadius: 5,
    padding: 10,
    fontSize: 16,
  },
  multilineInput: {
    height: 100,
    textAlignVertical: 'top',
  },
  buttonRow: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    marginTop: 20,
  },
  actionButton: {
    flex: 1,
    padding: 15,
    borderRadius: 5,
    alignItems: 'center',
    marginHorizontal: 5,
  },
  cancelButton: {
    backgroundColor: '#ccc',
  },
  confirmButton: {
    backgroundColor: '#0363b4',
  },
  buttonText: {
    color: '#fff',
    fontWeight: 'bold',
  },
});

export default ItinerarioScreen;