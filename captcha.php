<?php

class Captcha
{
    static string $secret = "6Lc7veYUAAAAAOpV3w9_rciwj51RnVqtQNT7gIzS"; //no to niezły secret

    public static function Verify($response)
    {
        $secret = Captcha::$secret;
        $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
        $captcha_success = json_decode($verify);

        if ((!isset($captcha_success->success)) || $captcha_success->success == false)
        {
            return true;
        }
        else return false;
    }
}
