let arraynor = document.querySelectorAll('.nora');
let secondscount = document.querySelector('.secondscount');
let pointscount = document.querySelector('.pointscount');
let time = 60;
let timer;
let points = 0;

function timerreduce()
{
    --time;
    secondscount.innerHTML = time;
    timer = setTimeout(timerreduce, 1000);
    if (time == 0)
    {
        clearTimeout(timer);
        let audio = new Audio();
        audio.src = 'final.mp3';
        audio.play();
        document.body.style.backgroundImage = 'url(final.jpg)'

        nora11.remove();
        nora12.remove();
        nora13.remove();
        nora14.remove();
        nora15.remove();
        nora16.remove();
        nora17.remove();
        nora18.remove();
        nora21.remove();
        nora22.remove();
        nora23.remove();
        nora24.remove();
        nora25.remove();
        nora26.remove();
        nora27.remove();
        nora28.remove();
        nora31.remove();
        nora32.remove();
        nora33.remove();
        nora34.remove();
        nora35.remove();
        nora36.remove();
        nora37.remove();
        nora38.remove();
        nora41.remove();
        nora42.remove();
        nora43.remove();
        nora44.remove();
        nora45.remove();
        nora46.remove();
        nora47.remove();
        nora48.remove();
        nora51.remove();
        nora52.remove();
        nora53.remove();
        nora54.remove();
        nora55.remove();
        nora56.remove();
        nora57.remove();
        nora58.remove();
        nora61.remove();
        nora62.remove();
        nora63.remove();
        nora64.remove();
        nora65.remove();
        nora66.remove();
        nora67.remove();
        nora68.remove();
        nora71.remove();
        nora72.remove();
        nora73.remove();
        nora74.remove();
        nora75.remove();
        nora76.remove();
        nora77.remove();
        nora78.remove();
        nora81.remove();
        nora82.remove();
        nora83.remove();
        nora84.remove();
        nora85.remove();
        nora86.remove();
        nora87.remove();
        nora88.remove();
    }
}


function begin()
{
    let nora;
    let audio = new Audio();
    audio.src = 'soundtrack.mp3';
    audio.play();
    stb.remove();
    timerreduce();

    const startGame = setInterval(() =>
    {
        nora = arraynor[Math.floor(Math.random() * 64)];

        let krot = document.createElement("img");
        krot.setAttribute("src", "krot.jpg");
        krot.setAttribute("class", "krot");
        krot.style = "height: 75px";
        krot.style = "width: 75px";
        krot.style = "background-size: cover";
        krot.style = "background-position: center";

        nora.appendChild(krot);
        let randtime1 = 300 + Math.floor(700*Math.random());
        setTimeout(() =>
        {
            nora.removeChild(krot);
        }, randtime1);

        if (time <= 1)
        {
            clearInterval(startGame);
        }
    }, 1200);
}

window.addEventListener("click", (object) =>
{
    if (object.target == document.querySelector('.nora img'))
    {
        ++points;
        let audio = new Audio();
        audio.src = 'hit.mp3';
        audio.play();
        pointscount.innerHTML = points;
    }
}, false)


