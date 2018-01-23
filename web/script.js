$('#myCarousel').carousel();

function ski() {
	var display = document.getElementById("display");
	display.innerHTML="I love skiing! While I'm no where near as good as the guy in the picture, I love a little bit of powder up on the ski slopes!";
	display.classList.remove("orange_color");
	display.classList.remove("green_color");
	display.classList.add("blue_color");
}

function dirt() {
	var display = document.getElementById("display");
	display.innerHTML="Dirt Biking is something I've always wanted to get into and so I'm quite new to it. Going dirt biking in the desert is quite different than the mountains, but just as fun.";
	display.classList.remove("blue_color");
	display.classList.remove("green_color");
	display.classList.add("orange_color");
}

function mtn() {
	var display = document.getElementById("display");
	display.innerHTML="Maybe not as fun as having an engine on the bike, but it is a great way to stay in shape! There is something so satisfying about conquering a difficult trail however.";
	display.classList.remove("orange_color");
	display.classList.remove("blue_color");
	display.classList.add("green_color");
}