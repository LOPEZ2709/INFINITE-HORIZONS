import React, { useState } from 'react';
import { sumar, restar, multiplicar, dividir } from '../utils/operaciones';
import './calculadora-style.css';

const Calculadora = () => {
  const [valor, setValor] = useState('');
  const [resultado, setResultado] = useState('');

  const manejarClick = (caracter) => {
    setValor((prev) => prev + caracter);
  };

  const limpiar = () => {
    setValor('');
    setResultado('');
  };

  const borrarUltimo = () => {
    setValor((prev) => prev.slice(0, -1));
  };

  const calcularResultado = () => {
    try {
      const operadores = ['+', '-', '*', '/'];
      let operador = operadores.find((op) => valor.includes(op));
      if (!operador) return;

      const [a, b] = valor.split(operador).map(Number);
      let res;
      switch (operador) {
        case '+':
          res = sumar(a, b);
          break;
        case '-':
          res = restar(a, b);
          break;
        case '*':
          res = b === 0 ? "Error" : multiplicar(a, b); 
          break;
        case '/':
          res = dividir(a, b);
          break;
        default:
          res = 'Error';
      }
      setResultado(res.toString());
    } catch (err) {
      setResultado('Error');
    }
  };

  const botones = [
    'C', '/', '*', '⌫',
    '7', '8', '9', '-',
    '4', '5', '6', '+',
    '3', '2', '1', '=',
    '0', '.',
  ];

  return (
    <div className="calculadora">
      <h2>Calculadora</h2>
      <div className="pantalla" data-testid="pantalla">
        {resultado || valor || '0'}
      </div>
      <div className="botones">
        {botones.map((btn) => (
          <button
            key={btn}
            onClick={() => {
              if (btn === 'C') limpiar();
              else if (btn === '=') calcularResultado();
              else if (btn === '⌫') borrarUltimo();
              else manejarClick(btn);
            }}
          >
            {btn}
          </button>
        ))}
      </div>
    </div>
  );
};

export default Calculadora;