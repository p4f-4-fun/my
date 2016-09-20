/**
  * Coded by P4F [P4Fun]
  * 2016
 **/
'use strict';

$(document).ready( function() {	
	
	// Cache DOM 
	var $sidebar = $(".page-sidebar");
	
	$(".sidebar-hamburger").on("click", function() {
		if( $sidebar.hasClass("closed") ) {
			$sidebar
				.removeClass("closed")
				.addClass("opened");
		} else {
			$sidebar
				.removeClass("opened")
				.addClass("closed");
		}
	});

}); 

	/* $(".sidebar-hamburger").on("click", function() {
		if( $pageSidebar.hasClass("closed") ) {
			$pageSidebar.fadeOut(250, function() { 
				$pageSidebar.removeClass("closed"); 
			});
			$pageSidebar.addClass("opened").fadeIn(250);
		} else {
			$pageSidebar.fadeOut(250, function() { 
				$pageSidebar.removeClass("opened"); 
			});
			$pageSidebar.addClass("closed").fadeIn(250);
		}
	}); */
