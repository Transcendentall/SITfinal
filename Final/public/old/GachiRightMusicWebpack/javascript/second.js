document.querySelector("#h2").onclick = function()
{
    document.body.style.backgroundImage = 'url(f2.jpg)'
    let audio = new Audio();
    audio.preload = 'auto';
    audio.src = 'gachi2.wav';
    audio.play();
}