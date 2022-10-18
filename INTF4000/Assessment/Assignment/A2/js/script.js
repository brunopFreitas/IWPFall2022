window.electronAPI.onSendToFront((_event, albumObject) => {
    const musicTable = document.getElementById('musicTable')
    let tbody = document.createElement('tbody')
    // let row = document.createElement('tr')
    // let cell = document.createElement('td')
    // cell.innerHtml = "Hi"
    // row.appendChild(cell)
    // tbody.appendChild(row)
    // musicTable.appendChild(tbody)
    let row_2 = document.createElement('tr')
    let row_2_data_1 = document.createElement('td')
    row_2_data_1.innerHTML = "1."

    row_2.appendChild(row_2_data_1);
    tbody.appendChild(row_2);
    musicTable.appendChild(tbody)

    albumObject.forEach((songObject)=> {
        // let row = document.createElement('tr')
        // let cell = document.createElement('td')
        // cell.innerHtml = songObject.fileName
        // row.appendChild(cell)
        // tbody.appendChild(row)
        // musicTable.appendChild(tbody)
        let row_2 = document.createElement('tr')
        let row_2_data_1 = document.createElement('td')
        row_2_data_1.innerHTML = songObject.fileName
    
        row_2.appendChild(row_2_data_1);
        tbody.appendChild(row_2);
        musicTable.appendChild(tbody)
    })
})