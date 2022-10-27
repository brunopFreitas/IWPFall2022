const { app, BrowserWindow, ipcMain } = require('electron')
const path = require('path')
const url = require('url')
const fs = require('fs')
const mm = require('music-metadata')

//
// Functions
//

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

const isMusicFile = (filepath) => {
    const types = ['.mp3', '.wav']
    const ext = path.extname(filepath)

    if (types.includes(ext)) {
        return true
    }
    else {
        return false
    }
}

async function asyncGetMusicMetadata(file) {
    try {
        const fileMetadata = await mm.parseFile(file);
        return fileMetadata
    } catch (error) {
        return console.error('An error was encountered==' + error.message);
    }
}

const loadTracks = (musicFolder) => {
    let tracks = []

    fs.readdir(musicFolder, function (err, files) {
        if (err) {
            console.log('Error encountered: ' + err)
        }
       
        // Initialize track list with files in music folder path
        if (files) {
            files.forEach(function (file) {
                const musicFilePath = musicFolder + "\\" + file
                if (isMusicFile(musicFilePath)) {
                    tracks.push({
                        path: musicFilePath,
                        title: '',
                        album: '',
                        artist: '',
                        duration: '',
                        picture: '',
                        pictureFormat: '',
                        fileURL: ''
                    })
                }
            })
        }

        // Now get the metadata for each music file
        tracks.forEach(function (track) {
            asyncGetMusicMetadata(track.path).then(

                function (value) {
                    const metadata = value

                    if (value) {
                        const picture = mm.selectCover(metadata.common.picture)

                        track.title = metadata.common.title
                        track.album = metadata.common.album
                        track.artist = metadata.common.artist
                        track.duration = Math.round(metadata.format.duration)
                        track.picture = picture ? picture.data.toString('base64') : ""
                        track.pictureFormat = picture ? picture.format : ""
                        track.fileURL = url.pathToFileURL(track.path).href
                    }
                },
                function (error) {
                    console.log(error)
                }
            )
        })
    })

    return tracks
}

//
// Events (main processing)
//

app.whenReady().then(() => {
   
    const folderPath = "C:\\Users\\w0448225\\Documents\\brunoW0448225\\INTF4000\\Albuns\\The Smiths\\Hatful Of Hollow"

    const tracks = loadTracks(folderPath)

    const mainWindow = createWindow();

    mainWindow.webContents.once('dom-ready', () => {
        mainWindow.webContents.send('load-tracks', tracks)
    })


    //console.log('bye')
    //app.quit()

    app.on('activate', () => {
        if (BrowserWindow.getAllWindows().length === 0)
            createWindow()
    })
})

app.on('window-all-closed', () => {
    if (process.platform !== 'darwin') app.quit()
})
