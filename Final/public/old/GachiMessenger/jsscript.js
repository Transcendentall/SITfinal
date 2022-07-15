let messages = document.getElementsByClassName('chat')[0]
let sendbut = document.getElementsByClassName('sendbutton')[0]
let userinputedtext = document.getElementsByClassName('yourtext')[0]


sendbut.addEventListener('click', sendmessage)

function sendmessage()
{
    let message = userinputedtext.value
    if (message)
    {
        document.getElementsByClassName('chat')[0].innerHTML = document.getElementsByClassName('chat')[0].innerHTML + `<div class="phrase"><div class="yourphrase">${message}</div></div>`
        userinputedtext.value = ''
        setTimeout(() =>
        {
            let randphrase = Math.floor(5*Math.random());
            if (randphrase == 0)
            {
                document.getElementsByClassName('chat')[0].innerHTML = document.getElementsByClassName('chat')[0].innerHTML + `<div class="vantext phrase"><img src="avatar_van.jpg" width=30 height=30><div class="vanphrase">Fisting is three hundred bucks.</div></div>`
                let audio1 = new Audio();
                audio1.src = 'gachi1.mp3';
                audio1.play();
            }
            if (randphrase == 1)
            {
                document.getElementsByClassName('chat')[0].innerHTML = document.getElementsByClassName('chat')[0].innerHTML + `<div class="vantext phrase"><img src="avatar_van.jpg" width=30 height=30><div class="vanphrase">Fucking slaves! Get your ass back here!</div></div>`
                let audio2 = new Audio();
                audio2.src = 'gachi2.mp3';
                audio2.play();
            }
            if (randphrase == 2)
            {
                document.getElementsByClassName('chat')[0].innerHTML = document.getElementsByClassName('chat')[0].innerHTML + `<div class="vantext phrase"><img src="avatar_van.jpg" width=30 height=30><div class="vanphrase">Fuck you!</div></div>`
                let audio3 = new Audio();
                audio3.src = 'gachi3.mp3';
                audio3.play();
            }
            if (randphrase == 3)
            {
                document.getElementsByClassName('chat')[0].innerHTML = document.getElementsByClassName('chat')[0].innerHTML + `<div class="vantext phrase"><img src="avatar_van.jpg" width=30 height=30><div class="vanphrase">I am artist. I am a perfomance artist.</div></div>`
                let audio4 = new Audio();
                audio4.src = 'gachi4.mp3';
                audio4.play();
            }
            if (randphrase == 4)
            {
                document.getElementsByClassName('chat')[0].innerHTML = document.getElementsByClassName('chat')[0].innerHTML + `<div class="vantext phrase"><img src="avatar_van.jpg" width=30 height=30><div class="vanphrase">Deep dark fantasies...</div></div>`
                let audio5 = new Audio();
                audio5.src = 'gachi5.mp3';
                audio5.play();
            }
        },
            1000)
    }
}