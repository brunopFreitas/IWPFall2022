const path = require('path')
const fs = require('fs')
const url = require('url')
let jsaudio = require('jsmediatags')

// Path to mp3 files
const directoryPath = "C:/\Users/\w0448225/\Documents/\BrunoW0448225/\INTF4000/\Albuns/\The Smiths/\Hatful Of Hollow"

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
  songObject["filePath"] = path.resolve(directoryPath, file)
  albumObject.push(songObject)
});

console.log("this is the result: ", albumObject);

// Music metadata


// albumObject.forEach(function(albumElement) {
//   jsaudio.read(albumElement.filePath, {
//     onSuccess: function(tag) {
//       console.log(tag);
//     },
//     onError: function(error) {
//       console.log(':(', error.type, error.info);
//     }
//   });
// })





// ***************** ELECTRON PROCESS ******************
const {
  app,
  BrowserWindow,
  ipcMain
} = require('electron')

// Electron process Start
const createWindow = () => {
  const win = new BrowserWindow({
    width: 400,
    height: 600,
    frame: true,
    webPreferences: {
      preload: path.join(__dirname, 'preload.js')
    }
  })

  win.loadFile('index.html')
}

app.whenReady().then(() => {
  createWindow()

  app.on('activate', () => {
    if (BrowserWindow.getAllWindows().length === 0) createWindow()
  })


  // How to IPC?!
  // Sending info to html page
  const CHANNEL_NAME = 'main'

  ipcMain.on(CHANNEL_NAME, (event, albumObject) => {
    /** Show the request data */
    console.log(albumObject);

    /** Send a response for a synchronous request */
    event.returnValue = 'pong';
  })



})

app.on('window-all-closed', () => {
  if (process.platform !== 'darwin') app.quit()
})