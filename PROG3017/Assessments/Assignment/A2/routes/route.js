const express = require(`express`)
const router = express.Router()
const Pokemon = require('../models/pokemon')



// GET
router.get("/", async (req, res) => {
    try {
        const data = await Pokemon.find();
        res.status(200).json(data);
    } catch (err) {
        res.json({
            message: err
        })
    }
});

// POST
router.post("/", (req, res) => {

    const pokemon = new Pokemon({
        id: req.body.id,
        num: req.body.num,
        name: req.body.name,
        img: req.body.img,
        type: req.body.type,
        height: req.body.height,
        weight: req.body.weight,
        weaknesses: req.body.weaknesses,
        next_evolution: req.body.next_evolution
    });

    pokemon.save()
        .then(data => {
            res.status(201).json(data);
        })
        .catch(err => {
            res.status(422).json({
                message: err
            })
        })
})

// GET BY ID

router.get("/:Id", async (req, res) => {
    try{
        const specificPokemon = await Pokemon.findById(req.params.Id);
        if(!specificPokemon) {
            res.status(404).send("Not Found");    
        } else {
            res.status(200).json(specificPokemon);
        }
    } catch(err) {
        res.json({message: err});
    }
})

// DELETE

router.delete("/:Id", async (req, res) => {
    try{
        const deletedPokemon= await Pokemon.deleteOne({ _id: req.params.Id});
        if(deletedPokemon.deletedCount===0) {
            res.status(404).send("Not Found")
        } else {
            res.status(204).json(deletedPokemon);
        }
    } catch(err) {
        res.json({message: err});
    }
});


// PUT

router.put("/:Id", async (req, res) => {
    try{
        const updatedPokemon = await Pokemon.updateOne({ _id: req.params.Id},
             {$set: {
                id: req.body.id,
                num: req.body.num,
                name: req.body.name,
                img: req.body.img,
                type: req.body.type,
                height: req.body.height,
                weight: req.body.weight,
                weaknesses: req.body.weaknesses,
                next_evolution: req.body.next_evolution
            }})
            if(updatedPokemon.matchedCount===0) {
                res.status(404).send("Not Found");   
            } else {
                res.status(204).json(updatedPokemon)
            }
    } catch(err) {
            res.status(422).json({message: err});
        }
})

module.exports = router