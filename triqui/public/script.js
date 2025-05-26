document.addEventListener('DOMContentLoaded', () => {
    const tablero = document.getElementById('tablero');
    const mensaje = document.getElementById('mensaje');
    const btnReiniciar = document.getElementById('reiniciar');
    let juegoActivo = true;

   
    tablero.addEventListener('click', async (e) => {
        const celda = e.target.closest('.celda');
        if (!juegoActivo || !celda || celda.textContent !== '') return;

        const fila = celda.dataset.fila;
        const columna = celda.dataset.columna;

        try {
            const response = await fetch('', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `action=marcar&fila=${fila}&columna=${columna}`
            });
            const data = await response.json();

            if (data.success) {
                celda.textContent = data.jugador === 'X' ? 'O' : 'X';
                celda.classList.add(celda.textContent);

                if (data.ganador) {
                    mensaje.textContent = `¡Jugador ${data.ganador} ha ganado!`;
                    juegoActivo = false;
                } else if (data.empate) {
                    mensaje.textContent = '¡Empate!';
                    juegoActivo = false;
                } else {
                    mensaje.textContent = `Turno del jugador ${data.jugador}`;
                }
            }
        } catch (error) {
            mensaje.textContent = 'Error en la conexión';
        }
    });


    btnReiniciar.addEventListener('click', async () => {
        try {
            const response = await fetch('', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'action=reiniciar'
            });
            const data = await response.json();

            if (data.success) {
                document.querySelectorAll('.celda').forEach(c => {
                    c.textContent = '';
                    c.className = 'celda';
                });
                mensaje.textContent = 'Turno del jugador X';
                juegoActivo = true;
            }
        } catch (error) {
            mensaje.textContent = 'Error al reiniciar';
        }
    });
});