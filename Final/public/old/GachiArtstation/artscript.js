begin();

async function begin()
{
    let promise = new Promise((resolve, reject) =>
    {
        const object = new XMLHttpRequest();
        object.open("GET", "artgallery.json");
        object.responseType = 'json'
        object.onloadend = () => { resolve(object); }
        object.send();
    });
    promise
        .then
        (object =>
        {
            addpictures(object.response)
        }, error =>
            {
                alert("ERROR!!! " + error);
            }
        )
}
function addgachipicture(src, itisbig)
{
    let picture = document.createElement("img");
    if (itisbig == false)
    {
        picture.setAttribute("class", "si");
    }
    else
    {
        picture.setAttribute("class", "bi");
    }
    picture.setAttribute("src", src);
    return picture;
}
function addpictures(data)
{
    let picture = null;
    let gachiarray = [];
    let smallimage = document.querySelectorAll('.smallimage');
    let bigimage = document.querySelectorAll('.bigimage');
    for (let i = 0; i < data['smallgachi'].length; i++)
    {
        gachiarray[i] = data['smallgachi'][i]['url'];
        picture = addgachipicture(gachiarray[i], false)
        smallimage[i].appendChild(picture);
    }
    for (let j = 0; j < data['biggachi'].length; j++)
    {
        gachiarray[j] = data['biggachi'][j]['url'];
        picture = addgachipicture(gachiarray[j], true)
        bigimage[j].appendChild(picture);
    }
}
