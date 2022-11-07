const musicTable = document.getElementById('musicTable')

const extAccepted = {
    songExt: ['.mp3', '.wav'],
    imgExt: ['.jpg', '.png']
}

window.electronAPI.onSendToFront((_event, albumObject) => {
    let tbody = document.createElement('tbody')

    albumObject.forEach((songObject) => {
        extAccepted.songExt.forEach((ext) => {
            if (songObject.ext === ext) {
                let row = document.createElement('tr')
                row.setAttribute('url', songObject.url)
                row.setAttribute("id", "track")

                let cellTrack = document.createElement('td')
                cellTrack.innerHTML = songObject.trackNo
                row.appendChild(cellTrack)

                let cellSongTitle = document.createElement('td')
                cellSongTitle.innerHTML = songObject.title
                cellSongTitle.setAttribute("class", "title")
                row.appendChild(cellSongTitle)

                let cellAlbumName = document.createElement('td')
                cellAlbumName.innerHTML = songObject.album
                cellAlbumName.setAttribute("class", "album")
                row.appendChild(cellAlbumName)

                let cellArtistName = document.createElement('td')
                cellArtistName.innerHTML = songObject.artist
                cellArtistName.setAttribute("class", "artist")
                row.appendChild(cellArtistName)

                let cellDuration = document.createElement('td')
                const minutes = Math.floor(songObject.duration / 60)
                const seconds = songObject.duration % 60
                function padTo2Digits(num) {
                    return num.toString().padStart(2, '0');
                }
                const result = `${padTo2Digits(minutes)}:${padTo2Digits(seconds)}`;
                cellDuration.innerHTML = result
                row.appendChild(cellDuration)

                tbody.appendChild(row)
                musicTable.appendChild(tbody)
            } else {
                extAccepted.imgExt.forEach((ext) => {
                    if (songObject.ext === ext) {
                        const coverArt = document.getElementById('cover')
                        coverArt.src = songObject.url
                    }
                })
            }
        })
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