// UNITS CONVERTER
#include "units_converter.h"

//.. PRESSURE
long double CUConv::bar_to_hPa(long double _a) const { return _a * 1000; }
long double CUConv::psi_to_hPa(long double _a) const { return _a * 68.94757; }

//.. TEMPERATURE
long double CUConv::C_to_K(long double _a) const { return _a + 273.15; }
long double CUConv::K_to_C(long double _a) const { return _a - 273.15; }
long double CUConv::C_to_F(long double _a) const { return (_a + 32) * 1.8; }
long double CUConv::F_to_C(long double _a) const { return (_a - 32) * 5/9; }
long double CUConv::F_to_K(long double _a) const { return ((_a - 32) * 5/9) + 273.15; }
long double CUConv::K_to_F(long double _a) const { return ((_a + 273.15) + 32) * 1.8; }

//.. VOlUME
long double CUConv::l_to_dm3(long double _a)  const { return _a; }
long double CUConv::dm3_to_l(long double _a)  const { return _a; }
long double CUConv::m3_to_dm3(long double _a) const { return _a * 1000; };
long double CUConv::m3_to_l(long double _a)   const { return _a * 1000; };
