const ventil = document.querySelectorAll('.ventil')
let matricaznacheniy = [[true, true, true, true], [true, true, true, true], [true, true, true, true], [true, true, true, true]];
let arrayofventils = [[], [], [], []];

document.addEventListener('DOMContentLoaded', function ()
{
    let number = 0;
    for (let i = 0; i < 4; ++i)
    {
        for (let j = 0; j < 4; ++j)
        {
            arrayofventils[i][j] = ventil[number];
            ++number;
        }
    }

//    for (let i = 0; i < 1; ++i)
    for (let i = 0; i < 3; ++i)
    {
        povorot(ventil[Math.floor(16*Math.random())], false);
    }
})


function povorot(ventilid, NeedAnimation)
{
    let znacheniya;
    for (let i = 0; i < 4; ++i)
    {
        for (let j = 0; j < 4; ++j)
        {
            if (ventilid == arrayofventils[i][j])
            {
                znacheniya = [i, j];
            }
        }
    }

    for (let i = 0; i < 4; ++i)
    {
        if (i != znacheniya[0])
        {
            if (matricaznacheniy[i][znacheniya[1]] == true)
            {
                if (NeedAnimation == true)
                {
                    arrayofventils[i][znacheniya[1]].style.transition = "transform 0.5s";
                    let audio1 = new Audio();
                    audio1.src = 'sound.wav';
                    audio1.play();
                }
                arrayofventils[i][znacheniya[1]].style.transform = "rotate(" + 90 + "deg)";
                matricaznacheniy[i][znacheniya[1]] = false;
            }
            else
            {
                if (NeedAnimation == true)
                {
                    arrayofventils[i][znacheniya[1]].style.transition = "transform 0.5s";
                    let audio1 = new Audio();
                    audio1.src = 'sound.wav';
                    audio1.play();
                }
                arrayofventils[i][znacheniya[1]].style.transform = "rotate(" + 0 + "deg)";
                matricaznacheniy[i][znacheniya[1]] = true;
            }
        }
    }

    for (let j = 0; j < 4; ++j)
    {
        if (matricaznacheniy[znacheniya[0]][j] == true)
        {
            if (NeedAnimation == true)
            {
                arrayofventils[znacheniya[0]][j].style.transition = "transform 0.5s";
                let audio1 = new Audio();
                audio1.src = 'sound.wav';
                audio1.play();
            }
            arrayofventils[znacheniya[0]][j].style.transform = "rotate(" + 90 + "deg)";
            matricaznacheniy[znacheniya[0]][j] = false;
        }
        else
        {
            if (NeedAnimation == true)
            {
                arrayofventils[znacheniya[0]][j].style.transition = "transform 0.5s";
                let audio1 = new Audio();
                audio1.src = 'sound.wav';
                audio1.play();
            }
            arrayofventils[znacheniya[0]][j].style.transform = "rotate(" + 0 + "deg)";
            matricaznacheniy[znacheniya[0]][j] = true;
        }
    }
}

ventil.forEach(ventilid =>
{
    ventilid.addEventListener('click', () =>
    {
        povorot(ventilid, true);
        setTimeout(() =>
        {
            if (((matricaznacheniy[0][0] && matricaznacheniy[0][1] && matricaznacheniy[0][2] && matricaznacheniy[0][3] && matricaznacheniy[1][0] && matricaznacheniy[1][1] && matricaznacheniy[1][2] && matricaznacheniy[1][3] && matricaznacheniy[2][0] && matricaznacheniy[2][1] && matricaznacheniy[2][2] && matricaznacheniy[2][3] && matricaznacheniy[3][0] && matricaznacheniy[3][1] && matricaznacheniy[3][2] && matricaznacheniy[3][3]) == true))
            {
                vent11.remove()
                vent12.remove()
                vent13.remove()
                vent14.remove()
                vent21.remove()
                vent22.remove()
                vent23.remove()
                vent24.remove()
                vent31.remove()
                vent32.remove()
                vent33.remove()
                vent34.remove()
                vent41.remove()
                vent42.remove()
                vent43.remove()
                vent44.remove()
                document.body.style.backgroundImage = 'url(victory.jpg)'
                let audio = new Audio();
                audio.src = 'epicwin.wav';
                audio.play();
            }
        }, 800);

    })
});