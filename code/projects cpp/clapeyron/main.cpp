#include <iostream>
#include <windows.h>
#include "menu.h"
#include "class_clapeyron.h"
#include "units_converter.h"

using namespace std;

HANDLE _catch = GetStdHandle(STD_OUTPUT_HANDLE);

int main() {

    // CONSOLE SETTINGS
    COORD con;

    con.X = 80;
    con.Y = 35;

    SetConsoleTitle("Clapeyron Equation @P4F");
    SetConsoleScreenBufferSize(_catch, con);
    SetConsoleTextAttribute(_catch, 12);
    /*
    // Pointer on converter class
    CUConv *p_UNITS = new CUConv;

    // Pointer on CLAPEYRON class
    CClapeyron *p_Clap = new CClapeyron;

    unsigned short iparam = 80;

    system("cls");
    cout << "|------------|\n";
    cout << "- PARAM ---> |" << iparam << "\n";
    cout << "|------------|\n";
    cout << "- bar_to_hPa |" << p_UNITS->bar_to_hPa(iparam) << " hPa\n";
    cout << "- psi_to_hPa |" << p_UNITS->psi_to_hPa(iparam) << " hPa\n";
    cout << "- C_to_F     |" << p_UNITS->C_to_F(iparam)     << char(248) << "F\n";
    cout << "- C_to_K     |" << p_UNITS->C_to_K(iparam)     << char(248) << "K\n";
    cout << "- dm3_to_l   |" << p_UNITS->dm3_to_l(iparam)   << " L\n";
    cout << "- F_to_C     |" << p_UNITS->F_to_C(iparam)     << char(248) << "C\n";
    cout << "- F_to_K     |" << p_UNITS->F_to_K(iparam)     << char(248) << "K\n";
    cout << "- K_to_C     |" << p_UNITS->K_to_C(iparam)     << char(248) << "C\n";
    cout << "- K_to_F     |" << p_UNITS->K_to_F(iparam)     << char(248) << "F\n";
    cout << "- l_to_dm3   |" << p_UNITS->l_to_dm3(iparam)   << " dm^3\n";
    cout << "- m3_to_dm3  |" << p_UNITS->m3_to_dm3(iparam)  << " dm^3\n";
    cout << "- m3_to_l    |" << p_UNITS->m3_to_l(iparam)    << " L\n";
    cout << "|------------|\n";
    cout << "- RET -----> |" << p_Clap->hManyMolN(16,2)     << "\n";
    cout << "|------------|\n";
    */
    CMenu *p_MENU = new CMenu;

    p_MENU->Show();

 return 0;
}
