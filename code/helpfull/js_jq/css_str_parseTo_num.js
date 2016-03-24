/*
 * Coded by P4F
 * in 2016
 *
*/

function cssStrToNum( param ) {
 	var unitLen = 2, // unit["px"].length; ex. 1 -> %, 2-> px, em, 3-> rem
 	    parserTemp = param.substr( 0, (param.length - unitLen) );
	return !param.match(/\./g) ? parseInt( parserTemp ) : parseFloat( parserTemp );
}
