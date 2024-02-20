<?php
function verifyString(string ...$string)
{
    foreach ($string as $str) : {
            if ($str == '' || ctype_space($str) || str_starts_with($str, ' ') || str_ends_with($str, ' ')) {
                return false;
                die();
            }
        }
    endforeach;
    return true;
}
function isDigits($element)
{
    return !preg_match("/[^0-9]/", $element);
}

function deleteAccents($chaine)
{
    $string =   preg_replace("/[^A-Za-z0-9.]/", '', $chaine);
    $string = trim($string);
    return $string;
};
function verifyMailInput(string $mail){
   if(preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $mail)){
    return true;
   }
}