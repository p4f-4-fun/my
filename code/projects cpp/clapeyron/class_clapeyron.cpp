// CLASS_CLAPEYRON
#include "class_clapeyron.h"

CClapeyron::CClapeyron()
{
    P = V = N = T = 0;
    R = 8.314;
}

long double CClapeyron::pressure(long double v, long double n, long double t)
{
    V = v;
    N = n;
    T = t;
    return (N * R * T) / V;
}

long double CClapeyron::volume(long double p, long double n, long double t)
{
    P = p;
    N = n;
    T = t;
    return (N * R * T) / P;
}

long double CClapeyron::temperature(long double p, long double v, long double n)
{
    P = p;
    V = v;
    N = n;
    return (P * V) / (N * R);
}
                                        //    16g    /(div)  3 mols
long double CClapeyron::hManyMolN(long double m, long double M)
{
    return m / M;
}
