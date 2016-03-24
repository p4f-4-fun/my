/*
 * Coded by P4F
 * in 2016
 *
*/

function cssStrToNum( param ) {
 	var unitLen = 2, // px, em itd.. if you need work with rem itd.. increase this value
 	    parserTemp = param.substr( 0, (param.length - unitLen) );
	return !param.match(/\./g) ? parseInt( parserTemp ) : parseFloat( parserTemp );
}
