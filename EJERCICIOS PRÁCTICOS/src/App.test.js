import { render, screen } from '@testing-library/react';
import App from './App';

test('renderiza la calculadora', () => {
  render(<App />);
  expect(screen.getByText(/calculadora/i)).toBeInTheDocument();
});