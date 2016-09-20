/* JS/ JQuery modal by P4F */

$(document).ready( function() {

    // Define variables with CSS 
    var modalCSS = {                    
        "background":     "rgba(0, 0, 0, 0.5)", 
        "position":       "fixed",     
        "overflow":       "auto",
        "display":        "block",
        "z-index":        "1",
        "height":         "100%",                   
        "width":          "100%",                    
        "left":           "0",                        
        "top":            "0"                         
    };
    
    var boxModalCSS = {                                  
        "margin-right":   "auto",                               
        "margin-left":    "auto",                                
        "margin-top":     "100px",                                
        "box-shadow":     "0px 0px 25px 10px rgba(0, 0, 0, 0.7)", 
        "background":     "url('../gfx/modalBg.jpg') -2px",
        "display":        "none",                                  
        "height":         "300px",                                
        "width":          "580px"                                  
    };                                    
    
    var modalInputFieldsCSS = {     
        "border-radius":  "4px",        
        "font-weight":    "bold",        
        "background":     "white",          
        "font-size":      "14px",
        "position":       "relative",        
        "padding":        "10px",             
        "border":         "2px solid black",   
        "color":          "black",           
        "left":           "44%",              
        "top":            "68%"               
    };
    
    // explodeCSS1 <-- This is builing CSS string from modalCSS
    var explodeCSS1 = "";
    for (p in modalCSS)
        explodeCSS1 += p + ": " + modalCSS[p] + "; ";
    
     // explodeCSS2 <-- This is builing CSS string from boxModalCSS
    var explodeCSS2 = "";
    for (p in boxModalCSS)
        explodeCSS2 += p + ": " + boxModalCSS[p] + "; "; 
    
     // explodeCSS3 <-- This is builing CSS string from modalInputFieldsCSS
    var explodeCSS3 = "";
    for (p in modalInputFieldsCSS)
        explodeCSS3 += p + ": " + modalInputFieldsCSS[p] + "; ";
    
    // Define template of div with modal
	var modalTemplate = "                                                            \
        <!-- MODAL -->                                                               \
        <!----------->                                                               \
        <Div id=\"modalid\" class=\"modal\" style=\""+ explodeCSS1 +"\">             \
            <div class=\"boxModal\" style=\""+ explodeCSS2 +"\">                     \
                <form id=\"modalForm\" method=\"post\" style=\"position: relative; top: 68%;\" action=\"modalToDB.php\">                                                           \
                    <input class=\"modalInputFields\" name=\"mailModal\" style=\""+ explodeCSS3 +"\" type=\"text\" placeholder=\"example@domain.com\" maxlength=\"50\" /> \
                    <input class=\"modalInputFields\" style=\""+ explodeCSS3 +"\" type=\"submit\" value=\"Zapisz się!\" />                                                         \
				</form>                                                              \
            </div>                                                                   \
        </Div>                                                                       \
    ";
    

	// Append div to end of body
	$('body').append(modalTemplate);
		
	// Sliding .boxModal box
	$('.boxModal').slideToggle(500);
		
	// Hover's
	$(".boxModal").hover( function() {
		$(this).css({
			"background-blend-mode": "overlay",
			"background-color":      "rgba(0, 0, 0, 0.2)",
			"transition":            "0.3s"
		});
	}, function() {
		$(this).css({
			"background":            "url('../gfx/modalBg.jpg') -2px",
			"transition":            "0.3s"
		});
	});
	
	$(".modalInputFields").hover( function() {
		$(this).css({
			"background":           "rgba(255, 255, 0, 0.9)",
			"box-shadow":           "0px 0px 5px 2px rgba(250, 250, 250, 0.7)",
			"transition":           "0.3s",
			"cursor":               "pointer"
		});
	}, function() {
		$(this).css({
			"box-shadow":            "none",
			"background":            "white",
			"transition":            "0.3s",
			"cursor":                "default"
		});
	});
	
	// Focus
	$(".modalInputFields").focusin( function() {
		$(this).css("background", "rgba(255, 255, 0, 0.8)");
	});
	
	$(".modalInputFields").focusout( function() {
		$(this).css("background", "white");
	});
								  	
	// Close modal
	$(window).click( function(e) {
		 if (e.target === document.getElementById("modalid"))
			 $(".modal").fadeOut(200);
	});
	
});


