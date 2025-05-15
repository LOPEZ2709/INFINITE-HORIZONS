import { render, screen, fireEvent } from '@testing-library/react';
import Calculadora from '../../../src/components/Calculadora';

test('renderiza la calculadora y muestra botones', () => {
  render(<Calculadora />);
  expect(screen.getByText('Calculadora')).toBeInTheDocument();
  expect(screen.getByText('7')).toBeInTheDocument();
  expect(screen.getByText('+')).toBeInTheDocument();
});

test('realiza una suma correctamente', () => {
  render(<Calculadora />);
  fireEvent.click(screen.getByText('2'));
  fireEvent.click(screen.getByText('+'));
  fireEvent.click(screen.getByText('3'));
  fireEvent.click(screen.getByText('='));
  expect(screen.getByText('5')).toBeInTheDocument();
});

test('limpia la pantalla al presionar C', () => {
  render(<Calculadora />);
  fireEvent.click(screen.getByText('9'));
  fireEvent.click(screen.getByText('C'));
  expect(screen.getByText('0')).toBeInTheDocument();
});
