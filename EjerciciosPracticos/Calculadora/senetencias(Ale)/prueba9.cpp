#include <iostream>
using namespace std;

int main() {
    int hora = 22;
    if (hora < 12) {
        cout << "Buenos días" << endl;
    } else if (hora < 18) {
        cout << "Buenas tardes" << endl;
    } else {
        cout << "Buenas noches" << endl;
    }
    return 0;
}