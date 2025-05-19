import { sumar, restar, multiplicar, dividir } from './operaciones';

describe('Funciones matemáticas básicas', () => {
  test('Suma correctamente', () => {
    expect(sumar(2, 3)).toBe(5);
    expect(sumar(-1, 1)).toBe(0);
    expect(sumar(0, 0)).toBe(0);
  });

  test('Resta correctamente', () => {
    expect(restar(5, 3)).toBe(2);
    expect(restar(10, -2)).toBe(12);
    expect(restar(0, 0)).toBe(0);
  });

  test('Multiplica correctamente', () => {
    expect(multiplicar(3, 4)).toBe(12);
    expect(multiplicar(-2, 5)).toBe(-10);
    expect(multiplicar(0, 5)).toBe(0);
  });

  test('Divide correctamente', () => {
    expect(dividir(8, 2)).toBe(4);
    expect(dividir(9, 4)).toBe(2.25);
    expect(dividir(-10, 2)).toBe(-5);
  });

  test('Manejo de división por cero', () => {
    expect(dividir(5, 0)).toBe("Error");
    expect(dividir(0, 0)).toBe("Error");
  });
});