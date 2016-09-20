// CLASS_CLAPEYRON HEADER

class CClapeyron {

    long double P, // PRESSURE [hPa]
                V, // VOLUME   [dm^3]
                N, // n x MOL ex. x * MOLs of Oxygen
                R, // const [ J/(mol*K) ]
                T; // TEMPERATURE [K]

 public:
    CClapeyron();

    long double pressure(long double, long double, long double);
    long double volume(long double, long double, long double);
    long double temperature(long double, long double, long double);
    long double hManyMolN(long double, long double);

};
