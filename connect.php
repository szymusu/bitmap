<?php

class Connector
{
    static $_host = "localhost";
    static $_db_user = "root";
    static $_db_name = "bitart";
    static $_db_password = "";

    public static function GetConnection()
    {
        $connection = @new mysqli(Connector::$_host, Connector::$_db_user, Connector::$_db_password, Connector::$_db_name);
        if ($connection->connect_errno != 0)
        {
            throw new Exception(mysqli_connect_errno());
        }
        mysqli_report(MYSQLI_REPORT_STRICT);
        return $connection;
    }

    public static function getUserIP()
    {
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') > 0)
            {
                $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
                return trim($addr[0]);
            }
            else
            {
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
        }
        else
        {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
}