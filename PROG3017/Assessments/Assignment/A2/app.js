const express = require(`express`)
const app = express()
const route = require(`./routes/route`)
const bodyParser = require("body-parser")
const db = require('./db/db')
require("dotenv/config");

mongoDB = db.getDb(process.env.DB_CONNECT)

app.use(bodyParser.json())
app.use(express.json())
app.use("/pokemon",route)


app.listen(3000)