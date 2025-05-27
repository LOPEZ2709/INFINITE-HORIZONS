
import { sumar, multiplicar } from '../../../utils/operaciones';

describe('Funciones matemáticas', () => {
  test('suma dos números correctamente', () => {
    expect(sumar(2, 3)).toBe(5);
  });

  test('multiplica dos números correctamente', () => {
    expect(multiplicar(3, 4)).toBe(12);
  });
});
