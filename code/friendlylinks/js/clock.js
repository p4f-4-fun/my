/* JavaScript */

// Faster to DOM
$ = function (id) { return document.getElementById(id); }

// Clock function
function clockF() {
	var d = new Date();
	var dofw = d.getDay();    // dzień tygodnia
	var nofm = d.getDate();   // dzień miesiąca [1-31]
	var nmofm = d.getMonth(); // nazwa miesiąca
	var h = d.getHours();
	var m = d.getMinutes();
	var s = d.getSeconds();
	
	switch(dofw) {
		case 0:  dofw = 'Poniedziałek'; break;
		case 1:  dofw = 'Wtorek'; 		break;
		case 2:  dofw = 'Środa'; 		break;
		case 3:  dofw = 'Czwartek'; 	break;
		case 4:  dofw = 'Piątek'; 		break;
		case 5:  dofw = 'Sobota'; 		break;
		case 6:  dofw = 'Niedziela'; 	break;
		default: dofw = 'Ups... nowy dzień tygodnia?!';
	}
	
	switch(nmofm) {
		case 0:  nmofm = 'Styczeń';     break;
		case 1:  nmofm = 'Luty';        break;
		case 2:  nmofm = 'Marzec';      break;
		case 3:  nmofm = 'Kwiecień';    break;
		case 4:  nmofm = 'Maj';         break;
		case 5:  nmofm = 'Czerwiec';    break;
		case 6:  nmofm = 'Lipiec';      break;
		case 7:  nmofm = 'Sierpień';    break;
		case 8:  nmofm = 'Wrzesień';    break;
		case 9:  nmofm = 'Październik'; break;
		case 10: nmofm = 'Listopad';    break;
		case 11: nmofm = 'Grudzień';    break;
		default: nmofm = 'Ups.. nowy miesiąc nam doszedł?!';
	}
	
	$('clock1').innerHTML = (h < 10 ? ('0' + h) : h)+ ":" +
							(m < 10 ? ('0' + m) : m)+ ":" +
							(s < 10 ? ('0' + s) : s);
							
	$('tile4-numofDay').innerHTML = nofm;
	$('tile4-nameofMonth').innerHTML = nmofm;
	$('tile5-nameofWeek').innerHTML = dofw;
	setTimeout(clockF, 1000);
}
