const express = require(`express`)
const dataValidation = require(`./validatePerson`)
var uniqid = require('uniqid')
var morgan = require('morgan')
var cookieParser = require('cookie-parser')

const app = express()

app.use(express.json())
app.use(morgan('tiny'))
app.use(cookieParser())

let people = require('./people.json')

app.get('/people', (req, res) => {
    res.send(people)
    console.log('Cookies: ', req.cookies)
})

app.get('/people/:id', (req, res) => {
    let id = req.params.id
    let person = people.find(person => {
        return person.id == id
    })

    if (!person) {
        res.status(404).send()
    } else {
        res.send(person)
    }
    console.log('Cookies: ', req.cookies)
})

app.post('/people', (req, res) => {

    req.body.id = uniqid();
    const error = dataValidation.validatePerson(req.body)
    if (error) {
        return res.status(422).send(error.details)
    } else {
        people.push(req.body)
        res.status(201).send()
    }
    console.log('Cookies: ', req.cookies)
})

app.delete('/people/:id', (req, res) => {

    let id = req.params.id
    let person = people.find(person => {
        return person.id == id
    })

    if (!person) {
        res.status(404).send()
    } else {
        people = people.filter(person => {
            return person.id != id
        })
        res.status(204).send()
    }
    console.log('Cookies: ', req.cookies)

})

app.put('/people/:id', (req, res) => {

    let id = req.params.id
    let person = people.find(person => {
        return person.id == id
    })
    if (!person) {
        res.status(404).send()
    } else {
        req.body["id"] = id
        const error = dataValidation.validatePerson(req.body)
        if (error) {
            return res.status(422).send(error.details)
        } else {
            people = people.map(person => {
                if (person.id == id) {
                    return req.body
                } else {
                    return people
                }
            })
            res.status(204).send()
        }

    }
    console.log('Cookies: ', req.cookies)
})

app.listen(3000)