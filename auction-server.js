const express = require('express');
const { createServer } = require('node:http');
const { join } = require('node:path');
const { Server } = require('socket.io');

const app = express();
const server = createServer(app);
const io = new Server(server);

app.get('/', (req, res) => {
    res.sendFile(join(__dirname, 'auction-app.html'));
});

io.on('connection', (socket) => {
    socket.on('post auction', (response) => {
        io.emit('post auction', response);
    });
});

server.listen(3000, () => {
    console.log('server running at http://localhost:3000');
});

