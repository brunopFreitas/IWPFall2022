const { contextBridge, ipcRenderer } = require('electron')

contextBridge.exposeInMainWorld('electronAPI', {
    onLoadTracks: (callback) => ipcRenderer.on('load-tracks', callback)
    //, openFolder: () => ipcRenderer.invoke('dialog:openFolder')
})