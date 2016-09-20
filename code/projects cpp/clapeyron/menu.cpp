// MENU
#include <iostream>
#include "menu.h"

CMenu::CMenu() {
    std::cout << "Welcome!\n";
    std::cout << "--------\n\n";
};

bool CMenu::Show() {

    string opt = ["EXIT"];

    std::cout << opt[0];

    return true;
}
