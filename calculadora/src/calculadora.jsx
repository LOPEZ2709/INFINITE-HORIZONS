import React, { useState } from 'react';
import './calculadora-style.css';

const Calculadora = () => {
  const [num1, setNum1] = useState('');
  const [num2, setNum2] = useState('');
  const [operacion, setOperacion] = useState('');
  const [resultado, setResultado] = useState(null);
  const [mostrarResultado, setMostrarResultado] = useState(false);

  const calcular = () => {
    const n1 = parseFloat(num1);
    const n2 = parseFloat(num2);
    let res = 0;

    switch (operacion) {
      case 'suma':
        res = n1 + n2;
        break;
      case 'resta':
        res = n1 - n2;
        break;
      case 'multiplicacion':
        res = n1 * n2;
        break;
      case 'division':
        res = n2 !== 0 ? n1 / n2 : 'Error: División por cero';
        break;
      default:
        res = 'Operación inválida';
    }

    setResultado(res);
    setMostrarResultado(true);
  };

  const reiniciar = () => {
    setNum1('');
    setNum2('');
    setOperacion('');
    setResultado(null);
    setMostrarResultado(false);
  };

  return (
    <div className="calculadora-container">
      <h2>Calculadora</h2>
      <input
        type="number"
        placeholder="Número 1"
        value={num1}
        onChange={(e) => setNum1(e.target.value)}
        className="calculadora-input"
      />
      <input
        type="number"
        placeholder="Número 2"
        value={num2}
        onChange={(e) => setNum2(e.target.value)}
        className="calculadora-input"
      />
      <select
        value={operacion}
        onChange={(e) => setOperacion(e.target.value)}
        className="calculadora-select"
      >
        <option value="">Seleccione operación</option>
        <option value="suma">Suma</option>
        <option value="resta">Resta</option>
        <option value="multiplicacion">Multiplicación</option>
        <option value="division">División</option>
      </select>
      <button onClick={calcular} className="calculadora-button">Calcular</button>

      {mostrarResultado && (
        <div>
          <h3>Resultado: {resultado}</h3>
          <p>¿Desea hacer otra operación?</p>
          <button onClick={reiniciar} className="calculadora-button calculadora-button-green">Sí</button>
          <button onClick={() => alert('Fin de la operación')} className="calculadora-button calculadora-button-red">No</button>
        </div>
      )}
    </div>
  );
};

export default Calculadora;
