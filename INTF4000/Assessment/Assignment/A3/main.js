// ***************** ELECTRON PROCESS ******************
const path = require('path')
const mm = require('music-metadata')
const {
  app,
  BrowserWindow,
  ipcMain
} = require('electron')

const createWindow = () => {
  const win = new BrowserWindow({
    width: 500,
    height: 600,
    webPreferences: {
      preload: path.join(__dirname, 'preload.js')
    }
  })

  win.loadFile('index.html')
  // ipcMain.handle('fetchSongList', getMyMusic())

  return win
}

app.whenReady().then(() => {
  const mainWindow = createWindow()
  let albumObject = getMyMusic()

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

function getMyMusic() {
  const fs = require('fs')
  const url = require('url')

  const isMusicFile = (objectExt) => {
    const types = ['.mp3', '.wav']

    if (types.includes(objectExt)) {
      return true
    } else {
      return false
    }
  }


  // Path to mp3 files
  // Path to the song folder 
  const directoryPath = "/home/bruno/Documents/NSCC/Fall2022/INFT4000/Albuns/The Smiths/Hatful Of Hollow"

  // albumObject
  let albumObject = []

  // Metadata
  async function asyncGetMusicMetadata(file) {
    try {
      const fileMetadata = await mm.parseFile(file)
      return fileMetadata
    } catch (error) {
      return console.error('An error was encountered==' + error.message);
    }
  }

  // Reading Songs
  let album = fs.readdirSync(directoryPath, function (err, files) {
    //handling error
    if (err) {
      return console.log('Unable to scan directory: ' + err)
    }
  })

  //listing all files using forEach
  album.forEach(function (albumElement) {
    let songObject = {}
    songObject["url"] = url.pathToFileURL(path.resolve(directoryPath, albumElement)).href
    songObject["path"] = path.resolve(directoryPath, albumElement)
    songObject["ext"] = path.parse(albumElement).ext
    albumObject.push(songObject)
  })

  // Fetching metadata
  albumObject.forEach((albumElement) => {
    if (isMusicFile(albumElement.ext)) {
      asyncGetMusicMetadata(albumElement.path).then(
        function (value) {
          const metadata = value
          if (value) {
            albumElement["title"] = metadata.common.title
            albumElement["album"] = metadata.common.album
            albumElement["artist"] = metadata.common.artist
            albumElement["duration"] = Math.round(metadata.format.duration)
            albumElement["trackNo"] = metadata.common.track.no
            albumElement["year"] = metadata.common.year
            albumElement["genre"] = metadata.common.genre
            albumElement["composer"] = metadata.common.composer
          }
        }
      )
    }
  })
  return albumObject
}