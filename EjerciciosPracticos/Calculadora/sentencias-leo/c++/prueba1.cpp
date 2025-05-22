#include <iostream>     // Para imprimir en consola
#include <cmath>        // Para funciones matemáticas como sqrt
#include <vector>       // Para usar vectores (arreglos dinámicos)
#include <map>          // Para usar mapas clave-valor
#include <string>       // Para trabajar con cadenas de texto

int main() {
    // 1. Declarar e inicializar un entero
    int edad = 25;
    std::cout << "1. Edad: " << edad << std::endl;

    // 2. Declarar un número flotante
    float temperatura = 36.5;
    std::cout << "2. Temperatura: " << temperatura << std::endl;

    // 3. Mostrar un texto en pantalla
    std::cout << "3. Hola, mundo desde C++!" << std::endl;

    // 4. Operación de suma
    int suma = 10 + 15;
    std::cout << "4. Suma: 10 + 15 = " << suma << std::endl;

    // 5. Usar condicional if
    if (edad >= 18) {
        std::cout << "5. Eres mayor de edad." << std::endl;
    }

    // 6. Bucle for
    std::cout << "6. Contando del 1 al 5: ";
    for (int i = 1; i <= 5; i++) {
        std::cout << i << " ";
    }
    std::cout << std::endl;

    // 7. Declarar una cadena (string)
    std::string nombre = "Ana";
    std::cout << "7. Nombre: " << nombre << std::endl;

    // 8. Calcular raíz cuadrada
    double raiz = sqrt(49.0);
    std::cout << "8. Raíz cuadrada de 49: " << raiz << std::endl;

    // 9. Declarar un vector
    std::vector<int> numeros = {1, 2, 3, 4, 5};
    std::cout << "9. Elementos del vector: ";
    for (int num : numeros) {
        std::cout << num << " ";
    }
    std::cout << std::endl;

    // 10. Declarar un mapa (clave:valor)
    std::map<std::string, int> edades;
    edades["Carlos"] = 30;
    edades["Lucia"] = 22;
    std::cout << "10. Edad de Lucia: " << edades["Lucia"] << std::endl;

    // 11. Usar operador ternario
    bool esMayor = (edad > 18) ? true : false;
    std::cout << "11. ¿Edad > 18?: " << (esMayor ? "Sí" : "No") << std::endl;

    // 12. Mostrar la longitud de una cadena
    std::cout << "12. Longitud del nombre: " << nombre.length() << std::endl;

    // 13. Usar una función definida por el usuario
    auto saludar = [](std::string persona) {
        std::cout << "13. Hola, " << persona << "!" << std::endl;
    };
    saludar("Marta");

    return 0;
}






