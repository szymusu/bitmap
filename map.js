console.log("map.js loaded");

$(document).ready(function() {
    $(document).on("contextmenu",function(e){
       return false;
    }); 
}); 

var RenderNewMap = function(rows, columns, isFull)
{
    a = [];
    for (let index = 0; index < rows; index++)
    {
        a.push(new Row(index, columns, isFull, false));
    }
    return a;
}

var RenderMapFromBinary = function(rows, columns, addrArr)
{
    a = [];
    if (columns != 128) columns = 32;
    if (addrArr.length != rows) console.log("rows != adresy");
    for (let index = 0; index < addrArr.length; index++)
    {
        a.push(new Row(index, columns, false, addrArr[index]));
    }
    return a;
}

window.mouseDown = [false, false, false, false, false, false];

document.body.onmousedown = function(evt)
{
    window.mouseDown[evt.button] = true;
}
document.body.onmouseup = function(evt)
{
    window.mouseDown[evt.button] = false;
}