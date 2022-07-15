document.querySelector("#h3").onclick = function()
{
    document.body.style.backgroundImage = 'url(f3.jpg)'
    let audio = new Audio();
    audio.preload = 'auto';
    audio.src = 'gachi3.wav';
    audio.play();
}