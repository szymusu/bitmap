<?php
require_once "connect.php";
require_once "listElement.php";

class DbController
{
    public static function InsertJSON(string $JSON, int $bitRate,
                                    int $rows, string $author, string $description, string $ip)
    {
        try
        {
            $connection = Connector::GetConnection();

            if (!($connection->query(
                sprintf("INSERT INTO published (author, description, map_code, map_rows, bit_rate, ip) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')",
                mysqli_real_escape_string($connection, $author),
                mysqli_real_escape_string($connection, $description),
                mysqli_real_escape_string($connection, $JSON),
                mysqli_real_escape_string($connection, $rows),
                mysqli_real_escape_string($connection, $bitRate),
                mysqli_real_escape_string($connection, $ip)))))
            {
                throw new Exception($connection->error);
            }
            $connection->close();
            return true;
        }
        catch (Exception $e)
        {
            return "";
        }
    }

    public static function GetJSON(int $id)
    {
        try
        {
            $connection = Connector::GetConnection();

            if (!($result = ($connection->query(
                sprintf("SELECT map_code FROM published WHERE map_id='%s'",
                mysqli_real_escape_string($connection, $id))))))
            {
                throw new Exception($connection->error);
            }
            $connection->close();

            if ($result->num_rows != 1)
            {
                $result->free();
                return "";
            }
            $JSON = $result->fetch_assoc()['map_code'];
            $result->free();
            return $JSON;
        }
        catch (Exception $e)
        {
            return "";
        }
    }

    public static function GetList($keyword)
    {
        $connection = Connector::GetConnection();

        if ($keyword == false)
        {
            $query = sprintf("SELECT map_id, author, description FROM published WHERE 1");
        }
        else
        {
            $keyword = mysqli_real_escape_string($connection, $keyword);
            $query = "SELECT map_id, author, description FROM published WHERE author LIKE '%$keyword%' OR description LIKE '%$keyword%'";
        }
        if (!($result = ($connection->query($query))))
        {
            throw new Exception($connection->error);
        }
        $connection->close();
        $list = [];
        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $res = $result->fetch_assoc();
            $elem = new ListElement($res['map_id'], $res['author'], $res['description']);
            array_push($list, $elem);
        }
        $result->free();
        return json_encode($list);
    }
}