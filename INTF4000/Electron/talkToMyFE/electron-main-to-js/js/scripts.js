const hello = document.getElementById('hello')

window.electronAPI.onSayHello((_event, value) => {
    /*const oldValue = Number(counter.innerText)
    const newValue = oldValue + value
    counter.innerText = newValue*/
    hello.innerHTML = value
})