#include "euklides.h"
#include <iostream>

/* Class functions code */

cEuklides::cEuklides() {  _r = 0;  }

void cEuklides::loadValues() {

    bool ok = false,
         ok2 = false,
         sumOK = false;

    do {
        std::cout << "Type value 1: ";

        std::cin >> _a;
        ok = std::cin.good();
        if (!ok) {
            std::cin.clear();
            std::cin.ignore(1024, '\n');
            continue;
        }
        std::cout << "\n";

        std::cout << "Type value 2: ";

        std::cin >> _b;
        ok2 = std::cin.good();
        if (!ok2) {
            std::cin.clear();
            std::cin.ignore(1024, '\n');
            continue;
        }
        std::cout << "\n";

        if(ok && ok2)
            sumOK = true;

    } while(!sumOK);

    if (_a <= 0 || _b <= 0) {
        _a = 30;
        _b = 21;
        std::cout << "Values can be only >=0, so I load a=30 and b=21\n";
    }

}

int cEuklides::GCD() {

/*
 * Example of Euclidean algorithm
 *
 *   | _a | _b | _r | _r = _a % _b
 *   |----|----|----|
 *   | 30 | 21 | 9  |
 *   |----/----/----/
 *   | 21 |  9 | 3  |
 *   |----/----/----|
 *   |  9 |  3 | 0  |
 *   |----/----|----|
 */

    // Step by step
    do {
        _r = _a % _b;
        _a = _b;
        _b = _r;
    } while(_r != 0);

 return _a;
}
