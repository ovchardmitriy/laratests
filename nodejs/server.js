var express = require('express');
var http = require('http');
var app = express();
var server = http.createServer(app);

var io = require('socket.io')(server);
var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('test-channel');

redis.on('message', function (channel, message) {
    console.log('Message received');
    console.log(message);
});

io.on('connection', function (socket) {
    var room;

    socket.on('join', function (data) {
        room = data.room;

        socket.join(room);
        if (room in io.sockets.adapter.rooms) {
            io.sockets.in(room).emit('clients', {clientsNum: io.sockets.adapter.rooms[room].length});
        }
    });

    socket.on('disconnect', function () {
        if (room && room in io.sockets.adapter.rooms) {
            io.sockets.in(room).emit('clients', {clientsNum: io.sockets.adapter.rooms[room].length});
        }
    });
});

app.get('/', function (req, res) {
    res.send('Hello World!');
});

server.listen(3000, function () {
    console.log('Example app listening on port 3000!');
});
