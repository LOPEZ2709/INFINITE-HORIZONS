<?php
namespace Src;

class Triqui {
    private $tablero;
    private $jugadorActual;

    public function __construct() {
        $this->reiniciar();
    }

    public function reiniciar() {
        $this->tablero = [
            ['', '', ''],
            ['', '', ''],
            ['', '', '']
        ];
        $this->jugadorActual = 'X';
    }

    public function marcar($fila, $columna) {
        if ($this->tablero[$fila][$columna] === '') {
            $this->tablero[$fila][$columna] = $this->jugadorActual;
            $this->jugadorActual = ($this->jugadorActual === 'X') ? 'O' : 'X';
            return true;
        }
        return false;
    }

    public function hayGanador() {
        $lineas = [
            [[0, 0], [0, 1], [0, 2]],
            [[1, 0], [1, 1], [1, 2]],
            [[2, 0], [2, 1], [2, 2]],
            [[0, 0], [1, 0], [2, 0]],
            [[0, 1], [1, 1], [2, 1]],
            [[0, 2], [1, 2], [2, 2]],
            [[0, 0], [1, 1], [2, 2]],
            [[0, 2], [1, 1], [2, 0]]
        ];

        foreach ($lineas as $linea) {
            $a = $this->tablero[$linea[0][0]][$linea[0][1]];
            $b = $this->tablero[$linea[1][0]][$linea[1][1]];
            $c = $this->tablero[$linea[2][0]][$linea[2][1]];

            if ($a !== '' && $a === $b && $b === $c) {
                return $a;
            }
        }
        return null;
    }

    public function hayEmpate() {
        
        foreach ($this->tablero as $fila) {
            if (in_array('', $fila)) {
                return false;
            }
        }
     
        return $this->hayGanador() === null;
    }
}