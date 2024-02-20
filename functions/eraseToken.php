<?php
$cookie_name = 'access_token';
unset($_COOKIE[$cookie_name]);
// empty value and expiration one hour before
setcookie($cookie_name, '', time() - 3600, "/");


die();
