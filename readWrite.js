let myMap = false;
let mapJSON = '';
let listElems = [];

// Nic tu nie ma, precz

var SaveToJSON = function()
{
    if(!myMap) return;
    let mapObj = {};
    mapObj.bitRate = myMap[0].bitRate;
    mapObj.rows = myMap.length;
    mapObj.addrArr = [];
    mapObj.author = $('#author').val();
    mapObj.description = $('#description').val();
    for(let i = 0; i < myMap.length; i++)
    {
        mapObj.addrArr.push(BinaryToAddress(myMap[i].sumBin));
    }
    mapJSON = JSON.stringify(mapObj);
    AJAX("jsonSave.php", JSONSavedCallback, "captcha=" + grecaptcha.getResponse() + "&JSON=" + mapJSON + "&sanitizeXSS=true");
    return mapJSON;
}

var ReadFromJSON = function(id)
{
    AJAX("jsonRead.php", JSONReadCallback, "id=" + id);
}

//No serio mówię (piszę)

var RenderFromJson = function()
{
    if (!mapJSON) return;
    if (mapJSON[0] == "<")
    {
        console.log("token <");
        console.log(mapJSON);
        return;
    }
    let mapObj = JSON.parse(mapJSON);
    myMap = MapFromBinary(mapObj.rows, mapObj.bitRate, mapObj.addrArr);
}

var NewMap = function()
{
    $("#map").html("");
    let height = $("#height").val();
    height = (height > 200) ? 200 : Math.round(height);
    height = (height < 1) ? 1 : height;
    let width = $("#i128")[0].checked ? 128 : 32;
    let isFilled = $("#black")[0].checked;
    $("#json").text("");
    
    myMap = RenderNewMap(height, width, isFilled);
}

var MapFromBinary = function(rows, columns, addrArr)
{
    $("#map").html("");
    $("#json").html('<span style="font-size: 20px">Adresy:</span> ' + addrArr);
    return RenderMapFromBinary(rows, columns, addrArr);
}

function AJAX(url, callback, str)
{
    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) callback(this);
    };
    xhttp.open("POST", url, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(str);
}

function JSONSavedCallback(xhttp)
{
    mapJSON = xhttp.responseText;
    if (!mapJSON)
    {
        console.log("Response is empty");
        return;
    }
    if (mapJSON == "nocaptcha")
    {
        alert("Nie bądź robotem");
        return;
    }
    if (mapJSON[0] == "E" && mapJSON[1] == ":")
    {
        console.log(mapJSON);
        return;
    }
    grecaptcha.reset();
    //$("#json").text("length: " + mapJSON.length + mapJSON);
}
function JSONReadCallback(xhttp)
{
    mapJSON = xhttp.responseText;
    if (!mapJSON)
    {
        console.log("Response is empty");
        return;
    }
    RenderFromJson();
    window.scrollTo(0, 500);
}

function ListDisplayCallback(xhttp)
{
    listJSON = xhttp.responseText;
    if (!listJSON)
    {
        console.log("Response is empty");
        return;
    }
    if (listJSON == "keyword not set")
    {
        console.log(listJSON);
        return;
    }
    if (listJSON[0] == "E" && listJSON[1] == ":")
    {
        console.log(listJSON);
        return;
    }

    $("#list").html("");
    list = JSON.parse(listJSON);
    for (let i = 0; i < list.length; i++)
    {
        listElems.push(new ListElement(list[i]));
    }
}

var ListDisplay = function(keyword = "")
{
    AJAX("listRead.php", ListDisplayCallback, "keyword=" + keyword);
}

ListDisplay();