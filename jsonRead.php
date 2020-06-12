<?php
require_once "dbController.php";
session_start();

if(isset($_POST['id']) && $_POST['id'] != false && $_POST['id'] != "")
{
    if ($_POST['id'] == "self" && isset($_SESSION['JSON'])) echo $_SESSION['JSON'];
    else if ($_POST['id'] == "test") echo '{"bitRate":128,"rows":20,"addrArr":["::30:0:0:0:0:0","::","::","::","ff0:41fe:1e0::2:0:0:0","800:4040:7bc::7:0:0:0","800:4040:402:180:40c::","1000:4020:401:cc:410:8000::","19f0:4020:801:4c:800::","80e:2020:c01:2c:1016:f800::","c02:2020:403:2c:4020:1000::","3cc:2020:202:1a:20:1000::","30::1d4:1b:8000:1000:0:0","::20:0:0:0:0:0","::","::","::","::","::","::"]}';
    else
    {
        $JSON = DbController::GetJSON($_POST['id']);
        if ($JSON instanceof Exception)
        {
            echo $_SESSION['SERVER_ERROR'];
            exit();
        }
        else echo $JSON;
    }
}
else
{
    echo "";
}