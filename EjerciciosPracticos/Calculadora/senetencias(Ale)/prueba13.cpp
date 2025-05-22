#include <iostream>
using namespace std;

int main() {
    int edad = 15;
    bool tieneLicencia = true;
    if (edad >= 18 && tieneLicencia) {
        cout << "Puede conducir." << endl;
    }
    return 0;
}