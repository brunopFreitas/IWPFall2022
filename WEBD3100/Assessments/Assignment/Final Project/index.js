// Mounting my deck

(function () {
// Pagination
const previous = document.getElementById('previous')
const next = document.getElementById('next')

// Fetch my API for the first time
fetchMyAPI()

// Pagination
const paginationButton = document.querySelectorAll('.pagination-button').forEach(button => {
    button.addEventListener('click', event => {
        let purpose = event.target.getAttribute('id')
        let value = parseInt(event.target.getAttribute('page'))
        if(purpose==='previous') {
            if(value > 10) {
                value = value - 10
                let nextValue = value + 10
                event.target.setAttribute('page', value)
                next.setAttribute('page', nextValue)
            } else {
                value = 0
                event.target.setAttribute('page', value)
                let nextValue = value + 10
                next.setAttribute('page', nextValue)
            }
            //Removing if exist
            if(document.querySelectorAll('.card').length>0) {
                document.querySelectorAll('.card').forEach(
                    el => el.remove()
                )
            }
            fetchMyAPI()
        } else if (purpose==='next') {
            value = value + 10
            // Fixing pagination to data length
            if(value < 160) {
                event.target.setAttribute('page', value)
                let previousValue = value - 10
                if(previousValue < 0) {
                    previousValue = 0
                    previous.setAttribute('page', previousValue)
                } else {
                    previous.setAttribute('page', previousValue)
                }
            } else {
                value = 160
                event.target.setAttribute('page', value)
                let previousValue = value - 10
                previous.setAttribute('page', previousValue)
            }
            //Removing if exist
            if(document.querySelectorAll('.card').length>0) {
                document.querySelectorAll('.card').forEach(
                    el => el.remove()
                )
            }
            fetchMyAPI()
            
        }
    })
})

function fetchMyAPI() {
    // Fetching my api
fetch('https://pokeapi.co/api/v2/pokemon?limit=151')
.then((pokemonList) => pokemonList.json())
.then((pokemonData) => {
  // Setting pagination
  let initial = parseInt(previous.getAttribute('page'))
  let final = parseInt(next.getAttribute('page'))

  // Creating elements
  pokemonData.results.slice(initial,final).map(item => {
    // Grabbing container that hold the cards
      const deckContainer = document.getElementsByClassName('deck-container')

    //   Creating elements
      const card = document.createElement('div')
      card.setAttribute('class', 'card animate slide delay-1')

      const cardHeader = document.createElement('h4')
      cardHeader.setAttribute('class','card-header animate slide delay-2')

      const cardImg = document.createElement('img')
      cardImg.setAttribute('class','img animate slide delay-3')
      cardImg.setAttribute('src','null')
      cardImg.setAttribute('alt','pokemonPic')

      const cardContainer = document.createElement('div')
      cardContainer.setAttribute('class','card-container')

      // Grabbing API data to mount my cards
      cardHeader.innerHTML = item.name

      // Grabbing pokemon ID in another URL
      fetch(item.url)
      .then((pokemonDetails) => pokemonDetails.json())
      .then((pokemonData) => {
        // Doing a fix of quantitiy of zeros before the number
            let pokemonId
            if(pokemonData.id < 10) {
                pokemonId = "0" + "0" + String(pokemonData.id)
            } else if (pokemonData.id >=10 && pokemonData.id < 100) {
                pokemonId = "0" + String(pokemonData.id)
            } else {
                pokemonId = String(pokemonData.id)
            }

            // Grabbing images
            cardImg.src = `https://www.serebii.net/pokemongo/pokemon/${pokemonId}.png`

            // Mounting a card
            card.appendChild(cardImg)
            card.appendChild(cardContainer)
            cardContainer.appendChild(cardHeader)
            deckContainer[0].appendChild(card)
        })
      })
  });

}

})()

// Menu Mobile Version
function myMenu() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
  }