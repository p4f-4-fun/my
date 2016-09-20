/**
  * Coded by P4F [P4Fun]
  * 2016
 **/
'use strict';

$(document).ready( function() 
{	
	// Configuration
	var width = 512,            // Picture/ slide width [px]
		animationSpeed = 500,  // speed in ms [1000ms = 1s]
		timeToNextSlide = 5500, // speed in ms [1000ms = 1s], 5.5s + .5s [animation time]
		currentSlide = 1;
	
	// Cache DOM
	var $slide = $('.slider-slides'),
		howMuchSlides = $('.slider-slide').length;
	
	// Start/ Stop variable
	var toggleInterval;
	
	// Functions
	function startSlider() {
		toggleInterval = setInterval( function() 
		{
			$slide.animate
			(
				{ "margin-left": "-="+ width }, // animation
				animationSpeed, 				// animation speed
				animateCallback                 // callback function
			);
		}, timeToNextSlide);
	}
	
	function cssStrToNum( param ) {
		var unitLen = 2, // unit["px"].length; ex. 1 -> %, 2-> px, em, 3-> rem
			parserTemp = param.substr( 0, (param.length - unitLen) );
		return !param.match(/\./g) ? parseInt( parserTemp ) : parseFloat( parserTemp );
	}
	
	function swipeleft() {
		//stopSlider();

		$slide.animate (
			{ "margin-left": "-="+ width }, // animation
			{ queue: true,					// queue animation
			  duration: animationSpeed },	// animation speed
			animateCallback                 // callback function
		);
	}
	
	
	
	function swiperight() {  
		//stopSlider();

		$slide.animate (
			{ "margin-left": "+="+ width }, // animation
			{ queue: true,					// queue animation
			  duration: animationSpeed },	// animation speed
			animateCallback                 // callback function
		);
	}
	
	
	
	function animateCallback() {
		// Check if this is last slide, and if it is
		// set "margin-left: 0"
		// return to first slide
		if (++currentSlide === howMuchSlides) {
			currentSlide = 1;
			$slide.css('margin-left', 0);
		}
	}
	
	
	
	function stopSlider() { clearInterval( toggleInterval ); }
	
	
	
	// Events
	$slide
		// DESKTOP
		//.on('mouseenter', function() { stopSlider();  })
		//.on('mouseout',   function() { startSlider(); })
		// MOBILE
		.on('swipeleft',  function() { 
			if( cssStrToNum( $slide.css("margin-left") ) > -3584 ) // 512px[width] * howMuchSlides - 1 
				swipeleft(); 
		})
		.on('swiperight', function() {
			if( cssStrToNum( $slide.css("margin-left") ) < 0 )
				swiperight(); 
		});
	
	// Init
	//startSlider();
	
});


