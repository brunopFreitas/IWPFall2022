const { ipcRenderer } = require('electron');

        /** Define channel name */
        const CHANNEL_NAME = 'main';

        /** Create a processor for a button's click event */
        const clickButton = () => {
          /** Message to be sent */
          let message = 'ping';

          /** Show response for a sync IPC request */
          console.log(ipcRenderer.sendSync(CHANNEL_NAME, message));
        }

        // YT tutorial
        // File is the variable that holds the filepath and fileURL
        // audio.play will play the audio?
        let audio = new Audio(file.filePaths[0]);
        audio.play();