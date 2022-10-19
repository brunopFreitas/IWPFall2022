// ***************** ELECTRON PROCESS ******************
const path = require('path')
const { app, BrowserWindow, ipcMain } = require('electron')

const createWindow = () => {
    const win = new BrowserWindow({
        width: 800,
        height: 600,
        webPreferences: {
            preload: path.join(__dirname, 'preload.js')
          }
    })

    win.loadFile('index.html')

    return win
}

app.whenReady().then(() => {
    const mainWindow = createWindow()

    mainWindow.webContents.once('dom-ready', () => {
        mainWindow.webContents.send('sendToFront', albumObject)
    });   

    app.on('activate', () => {
        if (BrowserWindow.getAllWindows().length === 0) 
            createWindow()
    })
})

app.on('window-all-closed', () => {
    if (process.platform !== 'darwin') app.quit()
})


// **************** BACKEND PROCESSESS ************************

const fs = require('fs')
const url = require('url')

// Path to mp3 files

// Path to the song folder 
const songDirectoryPath = "C:\\Users\\w0448225\\Documents\\brunoW0448225\\INTF4000\\Albuns\\The Smiths\\Hatful Of Hollow\\song"

// Path to the img folder
const imgDirectoryPath = "C:\\Users\\w0448225\\Documents\\brunoW0448225\\INTF4000\\Albuns\\The Smiths\\Hatful Of Hollow\\img"

// albumObject

let albumObject = []

// Reading Songs
let songs = fs.readdirSync(songDirectoryPath, function (err, files) {
  //handling error
  if (err) {
    return console.log('Unable to scan directory: ' + err);
  }
})

//listing all files using forEach
songs.forEach(function (song) {
  let songObject = {

  }
  songObject["songName"] = path.parse(song).name
  songObject["songURL"] = url.pathToFileURL(path.resolve(songDirectoryPath, song)).href
  songObject["songPath"] = path.resolve(song)
  albumObject.push(songObject)
});

// Reading cover
let covers = fs.readdirSync(imgDirectoryPath, function (err, files) {
  //handling error
  if (err) {
    return console.log('Unable to scan directory: ' + err);
  }
})

//listing all files using forEach
covers.forEach(function (cover) {
  let songObject = {

  }
  songObject["coverName"] = path.parse(cover).name
  songObject["coverURL"] = url.pathToFileURL(path.resolve(imgDirectoryPath, cover)).href
  songObject["coverPath"] = path.resolve(cover)
  albumObject.push(songObject)
});
