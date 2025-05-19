import { render, screen, fireEvent } from '@testing-library/react';
import Calculadora from '../../../components/Calculadora';

describe('Calculadora', () => {
  test('realiza una suma correctamente', () => {
    render(<Calculadora />);
    fireEvent.click(screen.getByText('2'));
    fireEvent.click(screen.getByText('+'));
    fireEvent.click(screen.getByText('3'));
    fireEvent.click(screen.getByText('='));
    expect(screen.getByTestId('pantalla').textContent).toBe('5');
  });

  test('realiza una resta correctamente', () => {
    render(<Calculadora />);
    fireEvent.click(screen.getByText('5'));
    fireEvent.click(screen.getByText('-'));
    fireEvent.click(screen.getByText('3'));
    fireEvent.click(screen.getByText('='));
    expect(screen.getByTestId('pantalla').textContent).toBe('2');
  });

  test('realiza una multiplicación correctamente', () => {
    render(<Calculadora />);
    fireEvent.click(screen.getByText('3'));
    fireEvent.click(screen.getByText('*'));
    fireEvent.click(screen.getByText('4'));
    fireEvent.click(screen.getByText('='));
    expect(screen.getByTestId('pantalla').textContent).toBe('12');
  });

  test('muestra error al dividir por cero', () => {
    render(<Calculadora />);
    fireEvent.click(screen.getByText('5'));
    fireEvent.click(screen.getByText('/'));
    fireEvent.click(screen.getByText('0'));
    fireEvent.click(screen.getByText('='));
    expect(screen.getByTestId('pantalla').textContent).toContain('Error');
  });
});
