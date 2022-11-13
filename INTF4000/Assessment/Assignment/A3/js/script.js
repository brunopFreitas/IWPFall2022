const musicTable = document.getElementById('musicTable')

const extAccepted = {
    songExt: ['.mp3', '.wav'],
    imgExt: ['.jpg', '.png']
}

window.electronAPI.onSendToFront((_event, albumObject) => {

    // Sorting array by ascending order
    let songObject = []
    let coverObject = []

    albumObject.filter((albumItem) => {
        extAccepted.songExt.forEach((ext) => {
            if (albumItem.ext === ext) {
                songObject.push(albumItem)
            }
        })
        extAccepted.imgExt.forEach((ext) => {
            if (albumItem.ext === ext) {
                coverObject.push(albumItem)
            }
        })
    })

    songObject.sort(function (a, b) {
        return a.trackNo - b.trackNo
    });


    // Big cover at top
    const coverArt = document.getElementById('cover')
    coverArt.src = coverObject[0].url

    let tbody = document.createElement('tbody')

    // Including sorted array in a table
    songObject.forEach((song) => {
        let row = document.createElement('tr')
        row.setAttribute('url', song.url)
        row.setAttribute("id", "track")

        let cellTrack = document.createElement('td')
        cellTrack.innerHTML = song.trackNo
        row.appendChild(cellTrack)

        let cellSongTitle = document.createElement('td')
        cellSongTitle.innerHTML = song.title
        cellSongTitle.setAttribute("class", "title")
        row.appendChild(cellSongTitle)

        let cellAlbumName = document.createElement('td')

        cellAlbumName.innerHTML = song.album
        cellAlbumName.setAttribute("class", "album")    
        
        // Thumbnail before album name
        let thumbCover = document.createElement('img')
        thumbCover.setAttribute("class", "img-thumbnail")
        thumbCover.src = coverObject[0].url
        cellAlbumName.appendChild(thumbCover)

        row.appendChild(cellAlbumName)

        let cellArtistName = document.createElement('td')
        cellArtistName.innerHTML = song.artist
        cellArtistName.setAttribute("class", "artist")
        row.appendChild(cellArtistName)

        // Duration
        let cellDuration = document.createElement('td')
        const minutes = Math.floor(song.duration / 60)
        const seconds = song.duration % 60

        function padTo2Digits(num) {
            return num.toString().padStart(2, '0');
        }
        const result = `${padTo2Digits(minutes)}:${padTo2Digits(seconds)}`;
        cellDuration.innerHTML = result
        row.appendChild(cellDuration)

        tbody.appendChild(row)
        musicTable.appendChild(tbody)
    })
})

$(document).on('click', '#track', function () {
    let url = $(this).attr('url')
    const audio = document.getElementById('audio')
    const songInfo = document.getElementById('songInfo')
    audio.src = url
    songInfo.innerHTML =
        $(this).children('.artist').text() +
        " - " +
        $(this).children('.album').text() +
        " - " +
        $(this).children('.title').text()
})