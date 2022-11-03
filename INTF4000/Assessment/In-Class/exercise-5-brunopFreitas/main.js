const { app, BrowserWindow, ipc, nativeTheme, screen } = require('electron')
const path = require('path')
const os = require('os-utils')

const createWindow = () => {

    let display = screen.getPrimaryDisplay()
    let winWidth = display.bounds.width
    let winHeight = display.bounds.height

    const win = new BrowserWindow({
        //Position
        width: 90,
        height: 130,
        y: 1440 -170,
        x: 3440 - 90,
        titleBarStyle: 'hidden',
        webPreferences: {
            preload: path.join(__dirname, 'preload.js')
        }
    })
     
    win.setAlwaysOnTop(true, 'screen')
    win.loadFile('index.html')

    return win
}
           
app.whenReady().then(() => {
    const mainWindow = createWindow()

    mainWindow.webContents.once('dom-ready', () => {

        // Dark Theme
        nativeTheme.themeSource = 'dark'

        // Set a 2 second interval to get os info and send to renderer
        setInterval(() => {
            os.cpuUsage(function (n) {
                const tracker = {
                    cpu: n * 100,
                    mem: 100 - (os.freememPercentage() * 100)
                }
                
                mainWindow.webContents.send('os-tracker', tracker)
            })
        }, 1000)

    })


    app.on('activate', () => {
        if (BrowserWindow.getAllWindows().length === 0)
            createWindow()
    })
})

app.on('window-all-closed', () => {
    if (process.platform !== 'darwin') app.quit()
})
