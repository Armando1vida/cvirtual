var express = require('express');
var app = express();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.get('/',function(req,res) {
	res.sendfile('index.html');
})

io.on('connection',function(socket){
	console.log("usuario conectado");
	socket.on('chat',function(mensaje){
		console.log(mensaje);
		io.emit('chat',mensaje);
	});
})

http.listen(300);
