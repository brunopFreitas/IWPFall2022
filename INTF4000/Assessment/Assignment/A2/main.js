const path = require('path')
const fs = require('fs')
const url = require('url')
const {
  app,
  BrowserWindow,
  ipcMain
} = require('electron')

// Path to mp3 files
const directoryPath = path.join('/home/bruno/Documents/NSCC/Fall2022/INFT4000/Albuns/', 'The Smiths/Hatful Of Hollow');

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
  albumObject.push(songObject)
});

console.log("this is the result: ", albumObject);

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