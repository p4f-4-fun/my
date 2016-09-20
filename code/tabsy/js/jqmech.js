/* JQuery mechanics */

$(document).ready( function() {
    
	// handle used in events
    var in1 = document.getElementById('in1');
  
    // Animation of left side bar when page is loaded
    $('.button').hide(100).slideDown(1000);
    
    // CONSOLE HELP POP-UP BUTTONS 
	var iretT = 0,    		  // icon-retweet top  counted from 0px [document]
		iretL = 0,    		  // icon-retweet left counted from 0px [document]
		icanT = 0,    		  // icon-cancel top   counted from 0px [document] 
		icanL = 0,    		  // icon-cancel left  counted from 0px [document]
		scrollY = 0,  		  // scroll Y position [window]
		winWidth = 0, 		  // WINDOW width
		leftMoveParam = 150;  // Param used to controll help pop-up shift when screen is smaller than 1200px
		
	$('.icon-retweet').hover( 
		function() {
			iretT = $(".icon-retweet").offset().top;  
			iretL = $(".icon-retweet").offset().left; 
			scrollY = $(window).scrollTop(); 
			winWidth = $(window).width();
			
			// Help pop-up width must be sub from offset, when screen is smaller than 1200px,
			// because that Help pop-up will be cutted and look ugly.
			if (winWidth < 1200)
				iretL -= leftMoveParam; 
			
			$(".content").prepend( 
				$("<div class=\"help\" style=\"top: "+ ((iretT - scrollY) + 30) +
				  "px; left: "+ (iretL + 20) +"px;\">\
				   Reset array and console clearing</div>").fadeIn(100) );
		},
		function() {
			$('.help').toggle(200, function() {
				$('.help').remove();
			});
		}
	);
	
	$('.icon-cancel').hover( 
		function() {
			icanT = $(".icon-cancel").offset().top;   
			icanL = $(".icon-cancel").offset().left;  
			scrollY = $(window).scrollTop();
			winWidth = $(window).width();
			
			// Help pop-up width must be sub from offset, when screen is smaller than 1200px,
			// because that Help pop-up will be cutted and look ugly.
			if (winWidth < 1200)
				icanL -= leftMoveParam; 
			
			$(".content").prepend( 
				$("<div class=\"help\" style=\"top: "+ ((icanT - scrollY) + 30) +
				  "px; left: "+ (icanL + 20) +"px;\">\
				   Only console clearing</div>").fadeIn(100) );
		},
		function() { 
			$('.help').toggle(200, function() { 
				$('.help').remove();
			});
		}
	);
	
	// CONSOLE BUTTONS 
    $('.icon-retweet').click( function() {  resetArray();  });  
    
    $('.icon-cancel').click( function() {
        
        clearConsole();  
        
        $('#midConsole').prepend("<span class='aLTimeCol'>"+ geterDate() +
								 "#</span>" + "<span class='aLdidFuncCol'>\
								 this -> clearConsole();</span><br /><br />");
        
        $('#in1').val('');  
    
    });
    
    
    // LEFT SIDE BAR
    $('#srt').click( function() {  sorter();    });
    $('#pop').click( function() {  poper();     });
    $('#sft').click( function() {  shifter();   });
    $('#psh').click( function() {  pusher(in1.value);  $('#in1').val('');     });
    $('#uft').click( function() {  unshifter(in1.value);  $('#in1').val('');  }); 
    $('#rev').click( function() {  reverser();  });
    
    
    // COLORIZING PREFOOTER VIA SOCIAL_TILES
    $('.social-fb').mouseover( function() {
        $('.prefooter').css("background-color", "#3b5998");
    });
    
    
    $('.social-yt').mouseover( function() {
        $('.prefooter').css("background-color", "#bb0000");
    });
    
    
    $('.social-tw').mouseover( function() {
        $('.prefooter').css("background-color", "#00aced");
    });
    
    
    $('.social-gplus').mouseover( function() {
        $('.prefooter').css("background-color", "#dd4b39");
    });
    
    
    $('.social-fb, .social-yt, .social-tw, .social-gplus').mouseout( function() {
        $('.prefooter').css("background-color", "#000025");
    });
        
});


