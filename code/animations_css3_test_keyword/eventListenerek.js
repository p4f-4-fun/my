/* JS via notepad 2016-04-23 */
'use strict';

window.onload = function() {
	// DOM cache
	var bodek = document.querySelector('body');
		
	if(bodek)
		bodek.addEventListener('click', function() { this.classList.toggle('bodyClickClass'); });
}