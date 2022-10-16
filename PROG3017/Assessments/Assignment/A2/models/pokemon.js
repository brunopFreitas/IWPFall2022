const mongoose = require("mongoose");

const Schema = mongoose.Schema;

const PokemonSchema = new Schema({
  id: { type: Number, required: true},
  num: { type: String, required: true},
  name: { type: String, required: true, maxLength: 100},
  img: { type: String, required: true, maxLength: 200},
  type: { type: Array, default : [], required: true },
  height: { type: String, required: false},
  weight: { type: String, required: false},
  weaknesses: {type: Array, default : [], required: true},
  next_evolution: {type: Array, default : [], required: true}
}, { collection: 'pokemon' });

// Export model
module.exports = mongoose.model("Pokemon", PokemonSchema);