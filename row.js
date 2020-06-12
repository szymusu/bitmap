class Row
{
    element;
    rowNumber;
    bitRate;
    sum = 0;
    sumBin = "";
    addrStr;
    bits = [];
    sumElement;

    constructor(rowNumber, bitRate, isFull, addrStr)
    {
        this.rowNumber = rowNumber;
        this.bitRate = bitRate;

        this.element = document.createElement("TR");
        this.element.className = "b" + bitRate.toString() + " row";
        document.getElementById('map').appendChild(this.element);

        this.sumElement = document.createElement("TR");
        this.sumElement.className = "b" + bitRate.toString() + " sum";

        if (addrStr == false)
        {
            for(let i = 0; i < this.bitRate; i += 8)
            {
                this.sumBin = this.sumBin + (isFull ? "11111111" : "00000000");
            }
            this.addrStr = BinaryToAddress(this.sumBin);
        }
        else
        {
            this.addrStr = addrStr;
            this.sumBin = AddressToBinary(addrStr, bitRate);
        }
        this.RenderRow();
    }

    UpdateValue(state, columnNumber)
    {
        this.sumBin = this.sumBin.substr(0, columnNumber) + (state ? "1" : "0") + this.sumBin.substr(columnNumber + 1);
        this.sumElement.innerHTML = BinaryToAddress(this.sumBin, this.bitRate);
    }

    RenderRow()
    {
        for (let j = 0; j < this.bitRate; j++)
        {
            this.bits.push(new Bit(this, j, (this.sumBin[j] == "1"), this.bitRate));
        }
        this.element.appendChild(this.sumElement);
    }
}

console.log("row.js loaded");