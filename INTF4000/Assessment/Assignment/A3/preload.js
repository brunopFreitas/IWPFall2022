const { contextBridge, ipcRenderer } = require('electron')

contextBridge.exposeInMainWorld('electronAPI', {
    onSendToFront: (callback) => ipcRenderer.on('sendToFront', callback)
})

// contextBridge.exposeInMainWorld('electronAPI',{
//     onSendToFront: () => ipcRenderer.invoke('fetchSongList')
//   })