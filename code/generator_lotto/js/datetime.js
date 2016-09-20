/* JS/ JQuery by P4F */
'use strict';

function datenTime() {
	var T = new Date();
		
	var day = T.getDate(),
		month = T.getMonth() + 1, // counted from 0
		year = T.getFullYear(),
		hour = T.getHours(),
		min = T.getMinutes(),
		sec = T.getSeconds(),
		formatDate = (day < 10 ? ("0" + day) : day) + "." + 
							(month < 10 ? ("0" + month) : month) + "." + 
							(year < 10 ? ("0"  + year) : year),
								
		formatTime = (hour < 10 ? ("0" + hour) : hour) + ":" + 
							 (min < 10 ? ("0" + min) : min) + ":" +
							 (sec < 10 ? ("0" + sec) : sec),
								 
		formatedDateTime = formatDate + "<br />" + formatTime;
		
		setTimeout("datenTime()", 1000);		
		$(".page-dateBox").html(formatedDateTime + "<div style=\"height: 5px;\"></div><span style='color: yellow; font-weight: bold;'>DZISIAJ</span>");
}	

$(document).ready( function() { datenTime(); });


