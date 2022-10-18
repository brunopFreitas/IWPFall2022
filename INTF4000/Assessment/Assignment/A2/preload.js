const { contextBridge, ipcRenderer } = require('electron')

contextBridge.exposeInMainWorld('electronAPI', {
    onSendToFront: (callback) => ipcRenderer.on('sendToFront', callback)
})