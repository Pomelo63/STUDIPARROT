<?php
require_once '../controllers/jwt.php';


if (isset($_COOKIE['access_token'])) {
    $jwt = new JWT();
    $token = $jwt->verifyJWT($_COOKIE['access_token']);
    $actifToken = $jwt->isActif($_COOKIE['access_token']);
    if ($actifToken === false && $token == 1) {
        json_encode($token);
        echo $token;
    } else {
        $cookie_name = 'access_token';
        unset($_COOKIE[$cookie_name]);
        setcookie($cookie_name, '', time() - 3600, "/");
        $nonOk= 0;
        json_encode($nonOk);
        echo $nonOk;
    }
} else {
    $cookie_name = 'access_token';
    unset($_COOKIE[$cookie_name]);
    setcookie($cookie_name, '', time() - 3600, "/");
    $nonOk= 0;
    json_encode($nonOk);
    echo $nonOk;
}
