let tracks = []

window.electronAPI.onLoadTracks((_event, value) => {
    tracks = value

    console.log(tracks)
})