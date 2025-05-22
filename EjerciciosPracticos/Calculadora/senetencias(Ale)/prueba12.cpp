#include <iostream>
using namespace std;

int main() {
    int numero;
    cout << "Ingrese un número entre 1 y 10: ";
    cin >> numero;
    while (numero < 1 || numero > 10) {
        cout << "Inválido. Ingrese nuevamente: ";
        cin >> numero;
    }
    cout << "Número válido: " << numero << endl;
    return 0;
}