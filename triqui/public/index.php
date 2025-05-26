<?php

session_start();


class Triqui {
    private $tablero = [['','',''],['','',''],['','','']];
    private $jugadorActual = 'X';

    public function marcar($fila, $columna) {
        if ($this->tablero[$fila][$columna] === '') {
            $this->tablero[$fila][$columna] = $this->jugadorActual;
            $this->jugadorActual = ($this->jugadorActual === 'X') ? 'O' : 'X';
            return true;
        }
        return false;
    }

    public function hayGanador() {
        // Combinaciones ganadoras (filas, columnas, diagonales)
        $lineas = [
            [[0,0],[0,1],[0,2]], [[1,0],[1,1],[1,2]], [[2,0],[2,1],[2,2]], // Filas
            [[0,0],[1,0],[2,0]], [[0,1],[1,1],[2,1]], [[0,2],[1,2],[2,2]], // Columnas
            [[0,0],[1,1],[2,2]], [[0,2],[1,1],[2,0]]  // Diagonales
        ];

        foreach ($lineas as $linea) {
            $a = $this->tablero[$linea[0][0]][$linea[0][1]];
            $b = $this->tablero[$linea[1][0]][$linea[1][1]];
            $c = $this->tablero[$linea[2][0]][$linea[2][1]];

            if ($a !== '' && $a === $b && $b === $c) return $a;
        }
        return null;
    }

    public function hayEmpate() {
        foreach ($this->tablero as $fila) {
            if (in_array('', $fila)) return false;
        }
        return $this->hayGanador() === null;
    }

    public function getJugadorActual() {
        return $this->jugadorActual;
    }
}


if (!isset($_SESSION['triqui'])) {
    $_SESSION['triqui'] = new Triqui();
}
$triqui = $_SESSION['triqui'];

// Manejar acciones AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'marcar':
                $response = [
                    'success' => $triqui->marcar($_POST['fila'], $_POST['columna']),
                    'jugador' => $triqui->getJugadorActual(),
                    'ganador' => $triqui->hayGanador(),
                    'empate' => $triqui->hayEmpate()
                ];
                break;
                
            case 'reiniciar':
                $_SESSION['triqui'] = new Triqui();
                $response = ['success' => true];
                break;
        }
        echo json_encode($response);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triqui PHP</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        .tablero { 
            display: grid; 
            grid-template-columns: repeat(3, 80px);
            grid-gap: 5px; 
            margin: 20px auto;
            width: 250px;
        }
        .celda {
            width: 80px; 
            height: 80px;
            border: 2px solid #333;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 36px;
            cursor: pointer;
        }
        .celda.X { color: #e74c3c; }
        .celda.O { color: #3498db; }
        #mensaje { margin: 20px; font-size: 20px; font-weight: bold; }
        button { 
            padding: 10px 20px; 
            font-size: 16px; 
            background: #2ecc71; 
            color: white; 
            border: none; 
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Juego de Triqui</h1>
    <div id="mensaje">Turno del jugador X</div>
    
    <div class="tablero" id="tablero">
        <?php for ($i=0; $i<3; $i++): ?>
            <?php for ($j=0; $j<3; $j++): ?>
                <div class="celda" data-fila="<?= $i ?>" data-columna="<?= $j ?>"></div>
            <?php endfor; ?>
        <?php endfor; ?>
    </div>
    
    <button id="reiniciar">Reiniciar Juego</button>

    <script src="script.js"></script>
</body>
</html>