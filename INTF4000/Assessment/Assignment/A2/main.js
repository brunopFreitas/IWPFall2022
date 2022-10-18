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


// **************** PROCESSESS ************************

const fs = require('fs')
const url = require('url')

// Path to mp3 files

const directoryPath = path.join('C:', 'Users', 'w0448225', 'Documents', 'W0448225', 'INTF4000', 'Album', 'The Smiths', 'Hatful Of Hollow')

// albumObject

let albumObject = []

// Reading files
let files = fs.readdirSync(directoryPath, function (err, files) {
  //handling error
  if (err) {
    return console.log('Unable to scan directory: ' + err);
  }
})

//listing all files using forEach
files.forEach(function (file) {
  let songObject = {

  }
  songObject["fileName"] = path.parse(file).name
  songObject["fileURL"] = url.pathToFileURL(path.resolve(directoryPath, file)).href
  songObject["filePath"] = path.resolve(file)
  albumObject.push(songObject)
});

console.log(albumObject)