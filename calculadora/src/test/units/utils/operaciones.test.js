import { sumar, restar, multiplicar, dividir } from '../../../src/utils/operaciones';

describe('Funciones matemáticas', () => {
  test('suma', () => {
    expect(sumar(2, 3)).toBe(5);
  });

  test('resta', () => {
    expect(restar(5, 2)).toBe(3);
  });

  test('multiplicación', () => {
    expect(multiplicar(3, 4)).toBe(12);
  });

  test('división', () => {
    expect(dividir(10, 2)).toBe(5);
  });

  test('división por cero lanza error', () => {
    expect(() => dividir(10, 0)).toThrow('División por cero');
  });
});
