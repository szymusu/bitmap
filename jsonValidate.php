<?php
require_once "bitmap.php";

class Validator
{
    public static function GetObjFromInput(string $JSON)
    {
        try
        {
            $JSON = htmlentities($JSON, ENT_NOQUOTES, "UTF-8");
            $obj = json_decode($JSON);

            if (!isset($obj->addrArr)) throw new Exception("Address array is not set");
            else $obj->addrArr = Validator::AddrArr($obj);

            if (!isset($obj->bitRate)) throw new Exception("Bitrate is not set");
            else $obj->bitRate = Validator::BitRate($obj->bitRate);

            if (!isset($obj->author)) $obj->author = "Anonymous";

            if (!isset($obj->description)) $obj->description = "Nic";

            $ip = Connector::getUserIP();

            return new Bitmap($obj->addrArr, $obj->bitRate, $obj->rows, $obj->author, $obj->description, $ip);
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    static function AddrArr($obj)
    {
        $addrArr = $obj->addrArr;
        if (is_countable($addrArr))
        {
            $obj->rows = count($addrArr);
            if ($obj->rows < 1)
            {
                throw new Exception("Address array is empty");
            }
            else
            {
                return $addrArr;
            }
        }
        else
        {
            throw new Exception("Address array is not array");
        }
    }
    static function BitRate(int $bitRate)
    {
        if ($bitRate == 32 || $bitRate == 128)
        {
            return $bitRate;
        }
        else
        {
            throw new Exception("Bitrate is not valid");
        }
    }
}