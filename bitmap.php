<?php

class Bitmap
{
    public $addrArr;
    public int $bitRate;
    public int $rows;
    public string $author;
    public string $description;
    public string $ip;

    function __construct($addrArr, int $bitRate, int $rows, string $author, string $description, string $ip)
    {
        $this->addrArr = $addrArr;
        $this->bitRate = $bitRate;
        $this->rows = $rows;
        $this->author = $author;
        $this->description = $description;
        $this->ip = $ip;
    }
}