/* JS Object creating */
var Book = {
	Title: "",
	Price: 0,
	setDataOfBook: function(Title, Price) {
		this.Title = Title;
		this.Price = Price;
	},
	
	getBookData: function() {
		document.write("Title: " + this.Title + "<br />");
		document.write("Price: " + this.Price + "$" + "<br />");
	} 
}

Book.setDataOfBook("Programming of JavaScript", 50);
Book.getBookData();

Book.coverMaterial = "Softcover";

Book.getCoverMaterial = function () {
	document.write("Cover's material: " + this.coverMaterial);
}

Book.getCoverMaterial();

document.write("<hr />");
document.write("<hr />");
document.write("<hr />");
/* ------------------------------- */
/* JS Constructor */
function Books(tit, pr, covM) {
	this.title = tit;
	this.price = pr;
	this.coverMaterial = covM;
	
	this.info = function() {
		document.write("Title: " + this.title + "<br />");
		document.write("Price: " + this.price + "$" + "<br />");
		document.write("Cover's material: " + this.coverMaterial + "<hr />");
	}
}

var book1 = new Books("Harry Potter Chamber of Secrets", 40.99, "Hardcover");
var book2 = new Books("Harry Potter and The Order of The Phoenix", 42.99, "Hardcover");
var book3 = new Books("Harry Potter and The Goblet of Fire", 36.99, "Hardcover");

book1.info();
book2.info(); 
book3.info();

document.write("<hr />");
document.write("<hr />");
/* ------------------------------- */
/* JS Constructor with setFunc and getFunc */
function Booke() {
	this.setBookData = function(tit, pr, covM) {
		this.title = tit;
		this.price = pr;
		this.coverMaterial = covM;
	}
	
	this.getInfo = function() {
		document.write("Title: " + this.title + "<br />");
		document.write("Price: " + this.price + "$" + "<br />");
		document.write("Cover's material: " + this.coverMaterial + "<hr />");
	}
}

var booke1 = new Booke();
var booke2 = new Booke();
var booke3 = new Booke();

booke1.setBookData("Harry Potter Chamber of Secrets", 40.99, "Hardcover");
booke2.setBookData("Harry Potter and The Order of The Phoenix", 42.99, "Hardcover");
booke3.setBookData("Harry Potter and The Goblet of Fire", 36.99, "Hardcover");

booke1.getInfo();
booke2.getInfo(); 
booke3.getInfo();

document.write("<hr />");
document.write("<hr />");
/* ------------------------------- */
/* JS Constructor with setFunc and getFunc and userFields */
function Booke2() {
	this.setBookData = function(tit, pr, covM) {
		this.title = tit;
		this.price = pr;
		this.coverMaterial = covM;
	}
	
	this.getInfo = function() {
		document.write("Title: " + this.title + "<br />");
		document.write("Price: " + this.price + "$" + "<br />");
		document.write("Cover's material: " + this.coverMaterial + "<hr />");
	}
}

var booke21 = new Booke2();
var booke22 = new Booke2();
var booke23 = new Booke2();

var param1Title = prompt("Type the title of book:", "");
var param2Price = parseInt(prompt("Type the price of book:", ""));
var param3coverM = prompt("Type the name of cover material:", "");

booke21.setBookData(param1Title, param2Price, param3coverM);
booke22.setBookData(param1Title, param2Price, param3coverM);
booke23.setBookData(param1Title, param2Price, param3coverM);

booke21.getInfo();
booke22.getInfo(); 
booke23.getInfo();
document.write("<hr />");
document.write("<hr />");
document.write("<br />");
document.write("<hr />");
/* ------------------------------- */
/* JS Constructor with setFunc and getFunc and userFields */
function Booke3() {
	this.setBookData = function(tit, pr, covM) {
		this.title = tit;
		this.price = pr;
		this.coverMaterial = covM;
	}
	
	this.getInfo = function() {
		document.write("Title: " + this.title + "<br />");
		document.write("Price: " + this.price + "$" + "<br />");
		document.write("Cover's material: " + this.coverMaterial + "<hr />");
	}
}

do {
	var counter = parseInt( prompt("How many objects?", "") );
} while ( isNaN(counter) );

var booke3 = new Array(counter);

if(booke3.length !== counter) {
	document.write("[*] ERROR: ARRAY LENGTH ISN'T THE SAME AS COUNTER OF OBJECTS!")
} else {
	for (var i=booke3.length; i > 0; --i) {
		booke3[i-1] = new Booke3();
		
		var param1Title = prompt("Type the title of book:", "");
		var param2Price = parseInt(prompt("Type the price of book:", ""));
		var param3coverM = prompt("Type the name of cover material:", "");
		
		booke3[i-1].setBookData(param1Title, param2Price, param3coverM);
		booke3[i-1].getInfo();
	}
}


