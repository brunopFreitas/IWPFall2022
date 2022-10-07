const express = require(`express`)

const app = express()

app.use(express.json())

let people = require('./people.json')

app.get('/people', (req, res)=> {
    res.send(people)
})

app.get('/people/:id', (req, res)=> {
    let id = req.params.id
    let person = people.find(person => {
        return person.id==id
    }) 

    if(!person) {
        res.status(404).send()
    } else {
        res.send(person)
    }
    
})

app.post('/people', (req, res)=> {

    people.push(req.body)
    res.status(201).send()
})

app.delete('/people/:id', (req, res)=> {

    let id = req.params.id
    let person = people.find(person => {
        return person.id==id
    }) 

    if(!person) {
        res.status(404).send()    
    } else {
        people = people.filter(person => {
            return person.id != id
        })
        res.status(204).send()
    }

})

app.put('/people/:id', (req, res) => {
    let id = req.params.id
    let person = people.find(person => {
        return person.id==id
    }) 

    if(!person) {
        res.status(404).send()
    } else {
       people = people.map(person => {
            if(person.id == id) {
                return req.body
            } else {
                return people
            }
        })
        res.status(204).send()
    }

})

app.listen(3000)

