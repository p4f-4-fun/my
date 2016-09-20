// UNITS CONVERTER HEADER
#include <iostream>

class CUConv {

 // .. variables are not needed;

 public:

    //.. PRESSURE

    long double bar_to_hPa(long double) const;
    long double psi_to_hPa(long double) const;

    //.. TEMPERATURE

    //CELCIUS TO KELVIN
    long double C_to_K(long double) const;
    //KELVIN TO CELCIUS
    long double K_to_C(long double) const;
    //CELCIUS TO FAHRENHEIT
    long double C_to_F(long double) const;
    //FAHRENHEIT TO CELCIUS
    long double F_to_C(long double) const;
    //FAHRENHEIT TO KELVIN
    long double F_to_K(long double) const;
     //KELVIN TO FAHRENHEIT
    long double K_to_F(long double) const;

    //.. VOlUME

    //LITER TO CUBIC DECIMETER
    long double l_to_dm3(long double) const;
    //CUBIC DECIMETER TO LITER
    long double dm3_to_l(long double) const;
    //CUBIC METER TO CUBIC DECIMETER
    long double m3_to_dm3(long double) const;
    //CUBIC METER TO LITER
    long double m3_to_l(long double) const;

};
