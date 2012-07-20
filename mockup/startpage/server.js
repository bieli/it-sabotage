var io = require('socket.io').listen(8123);
var players = {}, count = 0;

io.sockets.on('connection', function (socket) {
    var myNumber = ++count; //assign number
    var mySelf = players[myNumber] = [ myNumber ];

    for ( var player in players ) { //send initial update
        socket.send(
            player
        );
    }

    socket.on('message', function(message){
        console.log(message);

//TODO: run/execute command
//        mySelf[message]();

        socket.emit(message); // Send message to sender
        socket.broadcast.emit(message); // Send message to everyone BUT sender
/*
        socket.broadcast({
            player: myNumber,
            login: mySelf.login
        });
*/
    })

    socket.on('disconnect', function () {
        console.log('ON disconnect ID', myNumber);
        players[myNumber] = null;
    });
});


