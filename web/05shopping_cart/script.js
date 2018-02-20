var _subTotal = 0;
var _total = 0;
var _tax = 0;
var _shipping = 20;

function blackCheck() {
	if (document.getElementById("black").checked === true) {
		_subTotal += 500;
		addTax(500);
	} else {
		subTax(500);
		_subTotal -= 500;
	}
	document.getElementById("stotal").innerHTML = _subTotal;
	totalAmount();
}

function blueCheck() {
	if (document.getElementById("blue").checked === true) {
		_subTotal += 750;
		addTax(750);
	} else {
		subTax(750);
		_subTotal -= 750;
	}
	document.getElementById("stotal").innerHTML = _subTotal;
}

function yellowCheck() {
	if (document.getElementById("yellow").checked === true) {
		_subTotal += 1000;
		addTax(1000);
	} else {
		subTax(1000);
		_subTotal -= 1000;
	}
	document.getElementById("stotal").innerHTML = _subTotal;
}

function whiteCheck() {
	if (document.getElementById("white").checked === true) {
		_subTotal += 1500;
		addTax(1500);
	} else {
		subTax(1500);
		_subTotal -= 1500;
	}
	document.getElementById("stotal").innerHTML = _subTotal;
}


function addTax(stotal) {
	_tax = stotal * .1;
	_total += stotal + _tax + _shipping;

	document.getElementById("total").innerHTML = _total;
}	

function subTax(stotal) {
	_tax = stotal * .1;
	_total -= stotal + _tax + _shipping;

	document.getElementById("total").innerHTML = _total;
}


function cardNumber() {
	ck_card_number = /([0-9]{4}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4})|([0-9]{16})/;

	var _card_number = document.getElementById("card_number");

	if (!ck_card_number.test(_card_number)) {
		alert("Please enter a valid credit card number.");
	}
}

function cardDate() {
	ck_card_date = /^(0[1-9]|1[0-2])\/\d{4}$/g; 

	var _card_date = document.getElementById("exp_date");

	if (!ck_card_date.test(_card_date)) {
		//alert("Please enter a valid date. (MM/YYYY)");
	}
}


function resetForm() {
	alert("Form reset");
}


function onCheckout() {
	checkEmpty = /(\S)/;

	var _first_name = document.getElementById("first_name");
	var _last_name = document.getElementById("last_name");
	var _address = document.getElementById("address");
	var _phone = document.getElementById("phone");
	var _black = document.getElementById("black");
	var _blue = document.getElementById("blue");
	var _yellow = document.getElementById("yellow");
	var _white = document.getElementById("white");
	var _number = document.getElementById("card_number");
	var _date = document.getElementById("exp_date");

	if (!checkEmpty.test(_first_name)) {
		alert("Please enter first name");
	} 
	else if (!checkEmpty.test(_last_name)) {
		alert("Please enter last name");
	}
	else if (!checkEmpty.test(_address)) {
		alert("Please enter address");
	}
	else if (!checkEmpty.test(_phone)) {
		alert("Please enter phone number");
	}
	else if (_black.checked === false && _blue.checked === false && 
		_yellow.checked === false && _white.checked === false) {
		alert("Please select a product");
	}
	else if (!checkEmpty.test(_number)) {
		alert("Please enter credit card number");
	}
	else if (!checkEmpty.test(_date)) {
		alert("Please enter credit card expiration date");
	}
	else {
		alert("Form submitted. Thank you for your purchase!");
	}
}


/*
function welcome() {
	var person = prompt("Please enter your name:");

	if (person === null || person === "") {
		alert("Prefer to remain anonymous? Well ok then...");
	}
	else {
		alert("Welcome " + person + "!!");
	}
}
*/