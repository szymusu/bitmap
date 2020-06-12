console.log("converter.js loaded");

var AddressToBinary = function(address, bitRate)
{
    if (!(ipaddr.isValid(address))) return false;
    if (bitRate == 32)
    {
        let byteArr = ipaddr.IPv4.parser(address);
        let binStr = "";
        for (let i = 0; i < byteArr.length; i++)
        {
            let currByte = byteArr[i].toString(2);
            while (currByte.length < 8)
            {
                currByte = "0" + currByte;
            }
            binStr = binStr + currByte;
        }
        return binStr;
    }
    else if (bitRate == 128)
    {
        let byteArr = ipaddr.IPv6.parser(address).parts;
        let binStr = "";
        for (let i = 0; i < byteArr.length; i++)
        {
            let currByte = byteArr[i].toString(2);
            while (currByte.length < 16)
            {
                currByte = "0" + currByte;
            }
            binStr = binStr + currByte;
        }
        return binStr;
    }
}

var BinaryToAddress = function(binStr, bitRate)
    {
        while (binStr.length < bitRate)
        {
            binStr = "0" + binStr;
        }
        let byteArr = [];
        for (let i = 0; i < binStr.length; i += 8)
        {
            byteArr.push(parseInt(binStr.substr(i, 8), 2));
        }
        return ipaddr.fromByteArray(byteArr).toString();
    }