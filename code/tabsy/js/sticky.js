/* JS Array methods */

$(document).ready( function() {
    
	/**
	 * Checking UA in first
	 * - Many old platforms are not support well,
	 *   and become annoying in surf on page
	**/
	var UA = navigator.userAgent,
		// RegExp - search "android" "/g"lobaly and "/i"gnoring case sensitive
	    osplatfrom = /android/gi;
	
	if( !UA.match( osplatfrom ) ) {
		var navY = $('.fixedHeader').offset().top;
		
		function stickyBar() {
			var scrollY = $(window).scrollTop();
			
			// + 15px MAX -> little padding, NOT MORE, 
			// because in resolution higher than XXXXx1050, site is clipping 
			if (scrollY > (navY + 15)) 
				$('.fixedHeader').addClass('sticky'); 
			else
				$('.fixedHeader').removeClass('sticky');
		};
		
		stickyBar();
		
		$(window).scroll( function() {  stickyBar();  });
    }
	
});
