/* JS

TArray_original = ['Lorem', 'Ipsum', 'Dolor', 'Sit', 'Amet', 'Consectetur',
                       'Adipiscing', 'Elit', 'Etiam', 'Consequat'];

templateArray = '<span style="color: #00ff00;">XX:XX#</span>&nbsp;<span style="color: blue;">var</span>&nbsp;<span style="color: white;">TArray = [<span style="color: orange;">\'Lorem\'</span>, <span style="color: orange;">\'Ipsum\'</span>, <span style="color: orange;">\'Dolor\'</span>, <span style="color: orange;">\'Sit\'</span>, <span style="color: orange;">\'Amet\'</span>, <span style="color: orange;">\'Consectetur\'</span>, <span style="color: orange;">\'Adipiscing\'</span>, <span style="color: orange;">\'Elit\'</span>, <span style="color: orange;">\'Etiam\'</span>, <span style="color: orange;">\'Consequat\'</span>]; </span><br /><br />';

*/////////////////////////////////////////////////////////////////////


var TArray = ['Lorem', 'Ipsum', 'Dolor', 'Sit', 'Amet', 'Consectetur',
              'Adipiscing', 'Elit', 'Etiam', 'Consequat'];


function geterDate() {
    
    var _date = new Date();
    var _hour = _date.getHours();
    var _min = _date.getMinutes();
    var _sec = _date.getSeconds();
    
    var formatedTime = ( (_hour < 10) ? ('0' + _hour) : _hour )+ ':' +( (_min < 10) ? ('0' + _min) : _min )+ ":" +( (_sec < 10) ? ('0' + _sec) : _sec );
    
    setTimeout("geterDate()", 1000);
    
    return formatedTime;
    
}


function showArray(name) {
    
    var didFunc = name;
    
    var arrayLook = '<span class="aLTimeCol">'+ geterDate() +'#</span>&nbsp;<span class="aLVarCol">var</span>&nbsp;<span class="aLTATextCol">TArray = [<span class="aLElemCol">\''+ findUndef(TArray[0]) +'\'</span>, <span class="aLElemCol">\''+ findUndef(TArray[1]) +'\'</span>, <span class="aLElemCol">\''+ findUndef(TArray[2]) +'\'</span>, <span class="aLElemCol">\''+ findUndef(TArray[3]) +'\'</span>, <span class="aLElemCol">\''+ findUndef(TArray[4]) +'\'</span>, <span class="aLElemCol">\''+ findUndef(TArray[5]) +'\'</span>, <span class="aLElemCol">\''+ findUndef(TArray[6]) +'\'</span>, <span class="aLElemCol">\''+ findUndef(TArray[7]) +'\'</span>, <span class="aLElemCol">\''+ findUndef(TArray[8]) +'\'</span>, <span class="aLElemCol">\''+ findUndef(TArray[9]) +'\'</span>]; </span><span class="aLdidFuncCol">...'+ didFunc +'()\'ed!</span><br /><br />'; 
    
    $('#midConsole').prepend(arrayLook);
    $('#in1').val('');
    
}


// Sorting elements alphabetical
function sorter() {  TArray.sort();  showArray("sort");  }


// Remove last element from Array
function poper() {  
    
    if (TArray.length > 0) {
        TArray.pop();  
        showArray("pop");
    } else {
        $('#midConsole').prepend("<span class='aLTimeCol' style='color: red;'>"+ geterDate() +"#</span>" + "<span class='aLdidFuncCol'> TArray.length = 0; this -> array isEmpty! Add some values to it!</span><br /><br />");
    }
    
}


// Remove first element from Array and move all elements left
function shifter() {  
    
    if (TArray.length > 0) {
        TArray.shift();  
        showArray("shift");
    } else {
        $('#midConsole').prepend("<span class='aLTimeCol' style='color: red;'>"+ geterDate() +"#</span>" + "<span class='aLdidFuncCol'> TArray.length = 0; this -> array isEmpty! Add some values to it!</span><br /><br />");
    }
     
}


// Appending elements on end
function pusher(wot) {  
    
    if ( wot === "" || wot == null || (wot.replace(/^\s+|\s+$/g, '') === "") ) {
        $('#midConsole').prepend("<span class='aLTimeCol' style='color: red;'>"+ geterDate() +"#</span>" + "<span class='aLdidFuncCol'> Don't get me wrong, but I am computer, not a Salomon! I do nothing with an empty input_field!</span><br /><br />");
    } else if (TArray.length < 10) {
        TArray.push(wot);
        showArray("push"); 
    } else {
        $('#midConsole').prepend("<span class='aLTimeCol' style='color: red;'>"+ geterDate() +"#</span>" + "<span class='aLdidFuncCol'> TArray.length = 10; this -> array isFull! Remove some values from it!</span><br /><br />");
    }
     
}


// Appending elements on begin and moving rest on right
function unshifter(wot) {  
    
    if ( wot === "" || wot == null || (wot.replace(/^\s+|\s+$/g, '') === "") ) {
        $('#midConsole').prepend("<span class='aLTimeCol' style='color: red;'>"+ geterDate() +"#</span>" + "<span class='aLdidFuncCol'> Don't get me wrong, but I am computer, not a Salomon! I do nothing with an empty input_field!</span><br /><br />");  
    } else if (TArray.length < 10) {   
        TArray.unshift(wot); 
        showArray("unshift");  
    } else {
        $('#midConsole').prepend("<span class='aLTimeCol' style='color: red;'>"+ geterDate() +"#</span>" + "<span class='aLdidFuncCol'> TArray.length = 10; this -> array isFull! Remove some values from it!</span><br /><br />");
    }
    
}


// Reversing all elements in Array.
function reverser() {  TArray.reverse();  showArray("reverse"); }


// I think function name tell everything :)
function clearConsole() {  document.getElementById('midConsole').innerHTML = "";  }


// "" empty value look better than 'undefined'  
// in case of value from ex. Array[10] is empty at this moment
 function findUndef(co) {
    
    if (co != null) {  return co;  } 
    else {  co = "";  return co;  }
    
}

// RESET
function resetArray() {
    
    TArray = ['Lorem', 'Ipsum', 'Dolor', 'Sit', 'Amet', 'Consectetur',
              'Adipiscing', 'Elit', 'Etiam', 'Consequat'];
    
    clearConsole();
    
    showArray("resetArray");
    
}
