/* JS/ JQuery by P4F */
'use strict';

$(document).ready( function() {
	
	var binPattern = new RegExp(/^[0-1]+$/),
		boolLotto = binPattern.test(lottoS),
		boolPlus = binPattern.test(plusS),
		styleBadOut = "font-size: 1.2rem; color: #FFF; font-weight: bold;",
		styleWowOut = "font-size: 1.6rem; color: #BAF; font-weight: bold;",
		styleUpdate = "font-size: 1.4rem; color: #0F0; font-weight: bold;",
		styleNotUpdate = "font-size: 1.4rem; color: #F00; font-weight: bold;";
		
	if ( !boolLotto || !boolPlus )
		$(".isUpdateBox").prepend("<span style=\"" + styleBadOut + "\">Błędne dane z serwera lub próbwałeś hackować! ;/</span>");
	else if ( lottoS === 1 && plusS === 1 ) {
		$(".isUpdateBox").prepend("Lotto: <span style=\"" + styleUpdate + "\">Aktualne</span><br />")
								   .append("Lotto Plus: <span style=\"" + styleUpdate + "\">Aktualne</span>");
	}
	else if ( lottoS === 0 && plusS === 1 ) {
		$(".isUpdateBox").prepend("Lotto: <span style=\"" + styleNotUpdate + "\">Nieaktualne</span><br />")
								   .append("Lotto Plus: <span style=\"" + styleUpdate + "\">Aktualne</span>");
	}
	else if ( lottoS === 1 && plusS === 0 ) {
		$(".isUpdateBox").prepend("Lotto: <span style=\"" + styleUpdate + "\">Aktualne</span><br />")
								   .append("Lotto Plus: <span style=\"" + styleNotUpdate + "\">Nieaktualne</span>");
	}
	else if ( lottoS === 0 && plusS === 0 ) {
		$(".isUpdateBox").prepend("Lotto: <span style=\"" + styleNotUpdate + "\">Nieaktualne</span><br />")
								   .append("Lotto Plus: <span style=\"" + styleNotUpdate + "\">Nieaktualne</span>");
	}
	else
		$(".isUpdateBox").prepend("<span style=\"" + styleWowOut + "\">Wo.OW, OK.. so tell me how did you do dat!</span>");
		
});


