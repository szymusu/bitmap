class Bit
{
    element;
    state;
    rowNumber;
    row;
    columnNumber;
    value;
    bitRate;

    constructor(row, columnNumber, state, bitRate)
    {
        this.element = document.createElement("TD");
        this.element.className = "b" + bitRate.toString() + (state ? " bit1" : " bit0");
        row.element.appendChild(this.element);

        this.element.row = row;
        this.element.rowNumber = row.rowNumber;
        this.element.columnNumber = columnNumber;
        this.element.value = Math.pow(2, columnNumber);
        this.element.state = state;
        this.element.bitRate = bitRate;

        this.element.onclick = this.OnePixelOn;
        this.element.onmouseover = this.Switch;
        this.element.oncontextmenu =  this.OnePixelOff;

        row.UpdateValue(state, columnNumber);
    }

    Switch()
    {
        if (window.mouseDown[0]) this.state = true;
        else if (window.mouseDown[2]) this.state = false;
        else return;
        this.className = "b" + this.bitRate.toString() + (this.state ? " bit1" : " bit0") 

        this.row.UpdateValue(this.state, this.columnNumber);
    }

    OnePixelOn()
    {
        this.className = "b" + this.bitRate.toString() + " bit1";
        this.row.UpdateValue(true, this.columnNumber);
    }
    OnePixelOff()
    {
        this.className = "b" + this.bitRate.toString() + " bit0";
        this.row.UpdateValue(false, this.columnNumber);
    }
}

console.log("bit.js loaded");