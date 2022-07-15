document.querySelector("#h1").onclick = function()
{
    document.body.style.backgroundImage = 'url(f1.jpg)'
    let audio = new Audio();
    audio.preload = 'auto';
    audio.src = 'gachi1.wav';
    audio.play();
}