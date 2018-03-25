var http = require('http');
var url = require('url');
var fs = require('fs');
var port = 8888;

var server = http.createServer((function(req, res) {
	res.writeHead(200, {'Content-Type':'text/plain'});
	if (req.url == "/home"){
		res.writeHead(200, {'Content-Type':'text/html'});
		var webpage = "<!DOCTYPE html><html><head> <title>HOME</title></head><body";
		webpage += "<h1>Welcome to the Home Page</h1>";
		webpage += "</body></html>";
		res.write(webpage);
		res.end();
	}
	else if (req.url == "/getData") {
		var info = { "name":"Spencer Browning", "class":"cs313", "school":"byui"};
		info = JSON.stringify(info);
		fs.writeFileSync('myInfo.json', info);

		res.writeHead(200, {'Content-Type':'application/json'});
		fs.readFile('myInfo.json', (err, data)=>{
			if (err)
				throw err;
			let person = JSON.parse(data);
			res.write("name: " + person.name);
			res.write("\nclass: " + person.class);
			res.write("\nschool: " + person.school);
			res.end();
		});
	}
	else {
		res.statusCode = 404;
		res.write("Page Not Found");
		res.end();
	}
}));
server.listen(port);
console.log("Server is listening on port " + port);
