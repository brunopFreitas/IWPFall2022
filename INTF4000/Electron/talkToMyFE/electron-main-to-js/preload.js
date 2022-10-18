const { contextBridge, ipcRenderer } = require('electron')

contextBridge.exposeInMainWorld('electronAPI', {
    onSayHello: (callback) => ipcRenderer.on('say-hello', callback)
})