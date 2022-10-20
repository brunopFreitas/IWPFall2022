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
                let cell = document.createElement('td')
                cell.innerHTML = songObject.name
                cell.setAttribute('url', songObject.url)
                cell.setAttribute("id", "track")
                row.appendChild(cell)
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
    const songName = document.getElementById('songName')
    audio.src = url
    songName.innerHTML = $(this).text()
})