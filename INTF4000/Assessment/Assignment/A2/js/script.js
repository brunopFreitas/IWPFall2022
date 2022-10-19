window.electronAPI.onSendToFront((_event, albumObject) => {
    const musicTable = document.getElementById('musicTable')
    let tbody = document.createElement('tbody')

    albumObject.forEach((songObject) => {
        if (songObject.hasOwnProperty('songName')) {
            let row = document.createElement('tr')
            let cell = document.createElement('td')
            cell.innerHTML = songObject.songName
            row.appendChild(cell);
            tbody.appendChild(row);
            musicTable.appendChild(tbody)
        }
    })

    const coverArt = document.getElementById('cover')
    albumObject.forEach((songObject) => {
        if (songObject.hasOwnProperty('coverURL')) {
            coverArt.src = songObject.coverURL
        }
    })

    function play() {
        var audio = document.getElementById("audio");
        audio.play();
      }

})