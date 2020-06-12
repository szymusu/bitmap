<?php
session_start();
require_once "connect.php";
require_once "jsonValidate.php";
require_once "captcha.php";
require_once "dbController.php";

if (isset($_POST["sanitizeXSS"]) && $_POST["sanitizeXSS"] != "true")
{
    header("Location: cwaniak.php");
    exit();
}

if (!isset($_POST["captcha"]) || Captcha::Verify($_POST["captcha"]))
{
    echo "nocaptcha";
    exit();
}

if (isset($_POST['JSON']) && $_POST['JSON'] != false)
{
    $bitmap = Validator::GetObjFromInput($_POST['JSON']);
    if (!($bitmap instanceof Bitmap))
    {
        echo "E: $bitmap";
        exit();
    }
    $ip = $bitmap->ip;
    $bitmap->ip = "0.0.0.0";
    $JSON = json_encode($bitmap);
    $_SESSION['JSON'] = $JSON;

    $res = DbController::InsertJSON($JSON,
        $bitmap->bitRate, $bitmap->rows, $bitmap->author, $bitmap->description, $ip);
    if ($res === true)
    {
        echo $JSON;
    }
    else
    {
        echo "E: $res";
        exit();
    }
}
else
{
    echo "";
}