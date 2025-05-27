import { render, screen, fireEvent } from '@testing-library/react';
import Calculadora from '../../../components/calculadora'; 

test('realiza una suma correctamente', () => {
  render(<Calculadora />);
  fireEvent.click(screen.getByText('2'));
  fireEvent.click(screen.getByText('+'));
  fireEvent.click(screen.getByText('3'));
  fireEvent.click(screen.getByText('='));
  
  const pantalla = screen.getByText((content, element) => {
    return element.className === 'pantalla' && content === '5';
  });
  expect(pantalla).toBeInTheDocument();
});

test('realiza una multiplicación correctamente', () => {
  render(<Calculadora />);
  fireEvent.click(screen.getByText('3'));
  fireEvent.click(screen.getByText('*'));
  fireEvent.click(screen.getByText('4'));
  fireEvent.click(screen.getByText('='));
  const pantalla = screen.getByText((content, element) => {
    return element.className === 'pantalla' && content === '12';
  });
  expect(pantalla).toBeInTheDocument();
});

