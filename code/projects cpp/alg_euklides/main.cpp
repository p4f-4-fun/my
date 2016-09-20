#include <iostream>
#include "euklides.h"

int main() {

    // Creating object
    cEuklides objEuk;

    // Loader of values
    objEuk.loadValues();

    // DISPLAY -> Console
    std::cout << "\n---------------------------\n";
    std::cout << "The greatest common divisor => ";
    std::cout << objEuk.GCD() << "\n";

 return 0;
}
