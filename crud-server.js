const express = require('express'); // npm install express
const { createServer } = require('node:http');
const { join } = require('node:path');
const mysql = require('mysql'); // npm install mysql

const app = express();
const server = createServer(app);

const dbConn = mysql.createConnection({
    host: "localhost",
    user: "idevroot",
    password: "qazwsx",
    database: "idev_tesapus"
  });

app.get('/', (req, res) => {
    res.sendFile(join(__dirname, 'basic-crud.html'));
});

server.listen(3000, () => {
    console.log('server running at http://localhost:3000');
});


app.get('/product-histories', async (req, res) => {
    try {
        const prodHistories = await new Promise((resolve, reject) => {
            dbConn.query("select * from product_histories", function (error, result) {
                if (error) {
                    reject(error)
                } else {
                    resolve(result)
                }
            });
        });

        res.json({status : true, datas: prodHistories});
    } catch (error) {
        res.status(500).json({status:false, message: "An Error Occured"});
    }
});



