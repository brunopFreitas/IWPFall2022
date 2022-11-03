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
  


  // Path to mp3 files
  // Path to the song folder 
  const directoryPath = "C:\\Users\\w0448225\\Documents\\brunoW0448225\\INTF4000\\Albuns\\The Smiths\\Hatful Of Hollow"

  // albumObject
  let albumObject = []

  // Metadata
  async function asyncGetMusicMetadata(file) {
    try {
      const fileMetadata = await mm.parseFile(file);
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
    songObject["name"] = path.parse(albumElement).name
    songObject["ext"] = path.parse(albumElement).ext
    songObject["url"] = url.pathToFileURL(path.resolve(directoryPath, albumElement)).href
    songObject["path"] = path.resolve(albumElement)
    albumObject.push(songObject)
  })

  // Fetching metadata
  albumObject.forEach((albumElement)=>{
    asyncGetMusicMetadata(albumElement.path).then(

      function (value) {
          const metadata = value

          if (value) {
              const picture = mm.selectCover(metadata.common.picture)

              albumElement["title"] = metadata.common.title
              albumElement["album"] = metadata.common.album
              albumElement["artist"] = metadata.common.artist
              albumElement["duration"] = Math.round(metadata.format.duration)
              albumElement["picture"] = picture ? picture.data.toString('base64') : ""
              albumElement["pictureFormat"] = picture ? picture.format : ""
          }
      },
      function (error) {
          console.log(error)
      }
  )
})


  console.log(albumObject)
  return albumObject
}