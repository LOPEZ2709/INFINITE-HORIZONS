import React, { useState } from 'react';
import { sumar, multiplicar } from '../utils/operaciones';
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

  const calcularResultado = () => {
    try {
      const operadores = ['+', '*'];
      let operador = operadores.find((op) => valor.includes(op));
      if (!operador) return;

      const [a, b] = valor.split(operador).map(Number);
      let res;
      switch (operador) {
        case '+':
          res = sumar(a, b);
          break;
        case '*':
          res = multiplicar(a, b);
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
    '7', '8', '9', '*',
    '4', '5', '6', '+',
    '1', '2', '3', 'C',
    '0', '=', 
  ];

  return (
    <div className="calculadora">
      <h2>Calculadora</h2>
      <div className="pantalla">{resultado || valor || '0'}</div>
      <div className="botones">
        {botones.map((btn) => (
          <button
            key={btn}
            onClick={() => {
              if (btn === 'C') limpiar();
              else if (btn === '=') calcularResultado();
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
