const btn = document.getElementById('btn')
const filePathElement = document.getElementById('filePath')

btn.addEventListener('click', async () => {
  const filePath = await window.electronAPI.openFile()
//   Passing the filepath to the html filePathElement element
  filePathElement.innerText = filePath
})