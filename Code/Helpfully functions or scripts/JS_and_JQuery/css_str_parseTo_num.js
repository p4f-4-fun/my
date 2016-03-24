/*
 * Coded by P4F
 * in 2016
 *
*/

function cssStrToNum( param ) {
 	var parserTemp = param.substr( 0, (param.length - 2) );
	return !param.match(/\./g) ? parseInt( parserTemp ) : parseFloat( parserTemp );
}