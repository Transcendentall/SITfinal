let typesoftime = [['milliseconds', 999, 3], ['seconds', 59, 2], ['minutes', 59, 2]]
let startbut = document.getElementById('startbut')
let ButtonListeners = []
let LastValue = 0
let onMouseDownInterval = null
let countdownInterval = null
let isCountdownOn = false
startbut.addEventListener('click', start)
addButtonListeners()

function GetNumber(type)
{
    let a = Number(document.getElementById(`${type}oftime`).innerText)
    return a
}

function GetFormatNumber(value, length)
{
    if (value.length < length)
    {
        return`${"0".repeat(length - value.length)}${value}`
    }
    else
    {
        return value
    }
}

function SetNumber(type, value)
{
    document.getElementById(`${type}oftime`).innerText = value
    return document.getElementById(`${type}oftime`).innerText
}


function TimerEq0()
{
    for (let i = 0; i < typesoftime.length; ++i)
    {
        if (GetNumber(typesoftime[i][0]))
        {
            return false
        }
    }
    return true
}

function plus1(type, max, length)
{
    let value = GetNumber(type)

    let audio = new Audio();
    audio.preload = 'auto';
    audio.src = 'tic.wav';
    audio.play();
    if (value === max)
    {
        SetNumber(type, GetFormatNumber(`0`, length))
    }
    else
    {
        SetNumber(type, GetFormatNumber(`${value + 1}`, length))
    }

}

function minus1(type, max, length, step = 1)
{
    let value = GetNumber(type)
    let audio = new Audio();
    audio.preload = 'auto';
    audio.src = 'tac.wav';
    audio.play();
    if (value === 0)
    {
        SetNumber(type, GetFormatNumber(`${max - step + 1}`, length))
    }
    else
    {
        if (value <= step)
        {
            SetNumber(type, GetFormatNumber("0", length))
        }
        else
        {
            SetNumber(type, GetFormatNumber(`${value - step}`, length))
        }
    }
}

function setButtonListeners(type, max, length)
{
    let PlusButton = document.getElementById(type).getElementsByClassName('plusbut')[0]
    let MinusButton = document.getElementById(type).getElementsByClassName('minusbut')[0]
    let onIncrease = () => { plus1(type, max, length) }
    let onDecrease = () => { minus1(type, max, length) }
    let onStart = (callback) =>
    {
        removeBlinking()
        LastValue = GetNumber(type)
        onMouseDownInterval = setInterval(callback, 100)
    }
    let onStop = (callback) =>
    {
        if (onMouseDownInterval)
        {
            clearInterval(onMouseDownInterval)
            onMouseDownInterval = null
            if (GetNumber(type) === LastValue)
            {
                removeBlinking()
                callback()
            }
        }
    }
    ButtonListeners.push([PlusButton, 'mousedown', () => { onStart(onIncrease) }])
    ButtonListeners.push([PlusButton, 'mouseup', () => { onStop(onIncrease) }])
    ButtonListeners.push([PlusButton, 'mouseout', () => { onStop(onIncrease) }])
    ButtonListeners.push([MinusButton, 'mousedown', () => { onStart(onDecrease) }])
    ButtonListeners.push([MinusButton, 'mouseup', () => { onStop(onDecrease) }])
    ButtonListeners.push([MinusButton, 'mouseout', () => { onStop(onDecrease) }])
    ButtonListeners.slice(-6).map((listener) => { listener[0].addEventListener(listener[1], listener[2]) })
}

function addButtonListeners()
{
    typesoftime.map((element) => { setButtonListeners(element[0], element[1], element[2]) })
}

function removeButtonListeners()
{
    ButtonListeners.map((listener) => { listener[0].removeEventListener(listener[1], listener[2]) })
    ButtonListeners = []
}
function setBlinking()
{
    [...document.getElementsByClassName('number')].map((number) => { number.style.animationName = 'blinking' })
}

function removeBlinking()
{
    [...document.getElementsByClassName('number')].map((number) => { number.style.animationName = 'none' })
}

function babakh()
{
    setBlinking()
    console.log("БАБАХ!");

    let audio = new Audio();
    audio.preload = 'auto';
    audio.src = 'aa.wav';
    audio.play();

    plusbuttonsminutes.remove()
    minutesoftime.remove()
    minusbuttonminutes.remove()

    plusbuttonsseconds.remove()
    secondsoftime.remove()
    minusbuttonseconds.remove()

    plusbuttonsmilliseconds.remove()
    millisecondsoftime.remove()
    minusbuttonmilliseconds.remove()

    d2t2.remove()
    d2t.remove()
    document.body.style.backgroundImage = 'url(babakh.jpg)'
}

function countdown(c)
{
    let step
    if (c == true)
    {
        step = 1
    }
    else
    {
        step = 11
    }
    minus1(typesoftime[c][0], typesoftime[c][1], typesoftime[c][2], step)
    GetNumber(typesoftime[c][0]) === typesoftime[c][1] - step + 1 && c + 1 < typesoftime.length ? countdown(c + 1) : null
}

function start()
{
    if (isCountdownOn == false)
    {
        removeBlinking()
        removeButtonListeners()
        this.remove()
        countdownInterval = setInterval(() => { TimerEq0() ? babakh() : countdown(0) }, 11)
        isCountdownOn = true
    }
}
