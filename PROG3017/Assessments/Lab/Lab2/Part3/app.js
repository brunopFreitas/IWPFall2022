// Step 1
const builtinModules = require('builtin-modules');
console.log(builtinModules);

// Step 2
const isBuiltinModule = require('is-builtin-module');
console.log(isBuiltinModule('https'));

var http = require('http');

http.createServer(function (req, res) {
    res.writeHead(200, {
        'Content-Type': 'text/plain'
    });
    res.write('Hello World!');
    res.end();
}).listen(8080);

// Step 3
var validator = require('validator');

console.log(validator.isIP('127.0.0.1'));

// Step 4
var dayjs = require('dayjs')
console.log(dayjs('2022-10-04').format('DD/MM/YYYY'));

// Step 5
const sqlite3 = require('sqlite3').verbose();
let db = new sqlite3.Database(':memory:', (err) => {
    if (err) {
        return console.error(err.message);
    }
    console.log('Connected to the in-memory SQlite database.');
});

db.close((err) => {
    if (err) {
        return console.error(err.message);
    }
    console.log('Close the database connection.');
});
// Step 6
const axios = require('axios').default;

axios.get('https://foodish-api.herokuapp.com/api/').then(resp => {

    console.log(resp.data);
});

// Step 7

var nodemailer = require('nodemailer');
const transporter = nodemailer.createTransport({
    host: 'smtp.ethereal.email',
    port: 587,
    auth: {
        user: 'ardella.graham@ethereal.email',
        pass: 'jY4N9DqmbYHcC894CX'
    }
});

var mailOptions = {
    from: 'ardella.graham@ethereal.email',
    to: 'ardella.graham@ethereal.email',
    subject: 'Why Michaels assignments are so big?',
    text: 'They are fun, though.'
};

transporter.sendMail(mailOptions, function (error, info) {
    if (error) {
        console.log(error);
    } else {
        console.log('Email sent: ' + info.response);
    }
});

//   Step 8


//lodash
var _ = require('lodash');

let shopList = [
    'margerine',
    'bread',
    'tofu'
]

let coolerShopList = [
    'beer',
    'snacks'
]

var finalShopLlist = _.concat(shopList, coolerShopList)
console.log(shopList);
console.log(coolerShopList);
console.log(finalShopLlist);

//mongoose
var mongoose = require('mongoose');
console.log("creating connection to the database");

if (mongoose.connection.readyState === 0) {
    mongoose.connect('mongodb://localhost:27017');
    console.log('mongoose readyState is ' + mongoose.connection.readyState);
}
mongoose.connection.on('open', function (ref) {
    console.log('Connected to mongo server.');
    console.log('mongoose readyState is ' + mongoose.connection.readyState);
});

// chalk
const chalk=require("chalk");

console.log(chalk.blue('Hello world!'));