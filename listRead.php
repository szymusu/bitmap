<?php
require_once "connect.php";
require_once "dbController.php";

if (isset($_POST['keyword']))
{
    try
    {
        if ($_POST['keyword'] == "" || !is_string($_POST['keyword']))
        {
            $listJSON = DbController::GetList(false);
        }
        else
        {
            $listJSON = DbController::GetList(htmlentities(htmlentities($_POST['keyword'], ENT_NOQUOTES, "UTF-8")));
        }
        echo $listJSON;
    }
    catch (Exception $e)
    {
        echo "E: ".$e->getMessage();
    }
}
else
{
    echo "keyword not set";
}