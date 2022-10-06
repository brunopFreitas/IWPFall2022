const express = require(`express`)

const app = express()

let books = require('./books.json')

app.get('/books', (req, res)=> {
    res.send(books)
})

app.get('/books/:id', (req, res)=> {
    let id = req.params.id
    let bookMatch = books.find(book => {
        return book.id==id
    }) 

    if(!bookMatch) {
        res.status(404).send()
    } else {
        res.send(bookMatch)
    }
    
})

app.post('/books', (req, res)=> {

    console.log(req.body)
    //books.push(req.body)
    res.status(201).send()
})

app.delete('/books/:id', (req, res)=> {

    let id = req.params.id
    let bookMatch = books.find(book => {
        return book.id==id
    }) 

    if(!bookMatch) {
        res.status(404).send()    
    } else {
        books = books.filter(book => {
            return book.id != req.params.id
        })
        res.status(204).send()
    }

})

app.put('/books/:id', (req, res) => {
    let id = req.params.id
    let bookMatch = books.find(book => {
        return book.id==id
    }) 

    if(!bookMatch) {
        res.status(404).send()
    } else {
       books = books.map(book => {
            if(book.id == req.params.id) {
                return req.body
            } else {
                return book
            }
        })
        res.status(204).send()
    }

})

app.listen(3000)

