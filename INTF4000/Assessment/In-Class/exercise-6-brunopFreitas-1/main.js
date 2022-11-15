const {
    app,
    BrowserWindow,
    ipcMain,
    dialog
} = require('electron')

const path = require('path')

// Electron main process

function createWindow() {
    const mainWindow = new BrowserWindow({
        webPreferences: {
            preload: path.join(__dirname, 'preload.js')
        }
    })
    mainWindow.loadFile('index.html')
}

app.whenReady().then(() => {
    ipcMain.handle('dialog:openFile', handleFileOpen)
    createWindow()
    app.on('activate', function () {
        if (BrowserWindow.getAllWindows().length === 0) createWindow()
    })
})

app.on('window-all-closed', function () {
    if (process.platform !== 'darwin') app.quit()
})

// Functions

async function handleFileOpen() {
    const {
        canceled,
        filePaths
    } = await dialog.showOpenDialog({
        title: 'Choose a file',
        defaultPath: '.',
        buttonLabel: 'Choose only one file',
        filters: [
            { name: "WebPages", extensions: ["html"] }
          ],
        properties: ['openFile']
    })
    if (canceled) {
        return
    } else {
        return filePaths[0]
    }
}