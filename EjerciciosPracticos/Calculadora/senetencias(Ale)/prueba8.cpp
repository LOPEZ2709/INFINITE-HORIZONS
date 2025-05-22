#include <iostream>
using namespace std;

int main() {
    int opcion = 2;
    switch (opcion) {
        case 1:
            cout << "Opción 1" << endl;
            break;
        case 2:
            cout << "Opción 2" << endl;
            break;
        default:
            cout << "Opción no válida" << endl;
    }
    return 0;
}