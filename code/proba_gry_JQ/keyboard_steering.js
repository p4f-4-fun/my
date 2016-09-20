// JQuery

function cssparser(co) {
    var b = null;
    
    if (co.length === 3)
        b = co.substr(0, 1);
    else if (co.length === 4)
        b = co.substr(0, 2);
    else if (co.length === 5)
        b = co.substr(0, 3);
    else if (co.length === 6)
        b = co.substr(0, 4);
    else if (co.length === 7)
        b = co.substr(0, 5);
    else if (co.length === 8)
        b = co.substr(0, 6);
    else if (co.length === 9)
        b = co.substr(0, 7);
    else if (co.length === 10)
        b = co.substr(0, 8);
    
    return parseInt(b);
}

$(document).ready( function() {


    // MOVING
    var move = 20, // px;
        buff = 0;
    
    $(document).keydown( function(e) {
        
        switch(e.which) {
                
                // left
            case 37:
                buff = cssparser( $('.box').css("left") );
                
                if ( buff-20 <= 0 )
                    $('.box').css("left", "4px");
                else 
                    $('.box').css("left", (buff-move));
                break;
                
                // up
            case 38:
                /*
                buff = cssparser( $('.box').css("top") );
                
                if ( buff <= 0 )
                    $('.box').css("top", "0px");
                else 
                    $('.box').css("top", (buff-move));
                */
                break;
                
                // right
            case 39: 
                buff = cssparser( $('.box').css("left") );
                var t = "Buum!";
                
                if (buff >= 1000)
                    $('.box').css("left", "4px");
                if (buff + 58 >= cssparser( $('.trap').css("left") )) {
                    
                    if( cssparser( $('.box').css("top") )+55 <= cssparser(            $('.trap').css("top") ) ) 
                        $('.box').css("left", (buff+move) );
                    else
                        $('.box').css("left", buff);
                        $("#news").empty().prepend(t);
                }
                else 
                    $('.box').css("left", (buff+move) );
                break;
                
                // down
            case 40:
                /*
                buff = cssparser( $('.box').css("top") );
                
                if ( buff+52 >= cssparser( $('.floor').css("top") ) )
                    $('.box').css("top", (buff));
                else
                    $('.box').css("top", (buff+move));
                */
                break;
                
                // spacebar jump
            case 32:
                buff = cssparser( $('.box').css("top") );
                
                if (buff-150 <= 0)
                    $('.box').css("top", "248px");
                else {
                    $('.box').css("top", (buff-150));

                    setTimeout( function() {
                        $('.box').css("top", buff);
                    }, 200);
                }
                break;
            
            case 27:
                $('body').toggle(slow);
                break;
                
            default:;
                        
        }
        
    });    
    
});














