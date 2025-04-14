import React from 'react';
import { View, Text, StyleSheet } from 'react-native';

interface HeaderProps {
  title: string; 
}

const Header: React.FC<HeaderProps> = ({ title }) => {
  return (
    <View style={styles.header}>
      <Text style={styles.title}>{title}</Text>
    </View>
  );
};

const styles = StyleSheet.create({
  header: {
    paddingVertical: 24,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#fff',
    width: '100%',
    elevation: 5,
    shadowColor: '#000', //
    shadowOpacity: 0.1,
    shadowOffset: { width: 0, height: 2 }, 
    shadowRadius: 2,
  },
  title: {
    fontSize: 20,
    fontWeight: 'bold', 
    color: '#333',
  },
});

export default Header;