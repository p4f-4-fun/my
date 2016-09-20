//-------------------------------

/* Class definitions */
class cEuklides {

    int _a; 
    int _b; 
    int _r; // _r = _a % _b [mod]

 public:

    // CONSTRUCT
    cEuklides();

    // Loader
    void loadValues();

    // The Greatest Common Divisor Algorithm
    int GCD();

};

//-------------------------------
