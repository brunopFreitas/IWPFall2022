const musicTable = document.getElementById('musicTable')

window.electronAPI.onSendToFront((_event, albumObject) => {
    let tbody = document.createElement('tbody')

    albumObject.forEach((songObject) => {
        if (songObject.hasOwnProperty('songName')) {
            let row = document.createElement('tr')
            let cell = document.createElement('td')
            cell.innerHTML = songObject.songName
            cell.setAttribute('url',songObject.songURL)
            cell.setAttribute("id", "track")
            row.appendChild(cell);
            tbody.appendChild(row);
            musicTable.appendChild(tbody)
        }
    })

    const coverArt = document.getElementById('cover')
    albumObject.forEach((songObject) => {
        if(songObject.coverName=="Large" && songObject.hasOwnProperty('coverURL')) {
            coverArt.src = songObject.coverURL
        }
    })
})

$(document).on('click','#track',function(){
    let url = $(this).attr('url')
    const audio = document.getElementById('audio')
    audio.src = url

})