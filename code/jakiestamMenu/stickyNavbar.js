/* Sticky Bar code by P4F */

$(document).ready( function() {
	var navY = $('.nav').offset().top;
	
	var sticky = function() {
		var scrollY = $(window).scrollTop();
		
		// -10 from navY to more smoothly effect
		if (scrollY > (navY - 10) ) {
			$('.nav').addClass('sticky');
		} else {
			$('.nav').removeClass('sticky');
		}
	};
	
	sticky();
	
	$(window).scroll( function() {
		sticky();
	});	
});
