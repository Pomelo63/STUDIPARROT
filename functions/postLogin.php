<?php
require_once '../controllers/controllerMember.php';


$ctrlForm = new ControllerMember();

$email = $_POST['email'];
$password = $_POST['password'];
if (preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $_POST['email'])){
if ($email == '' || $password == '' || ctype_space($email) || ctype_space($password)) {
    $code = http_response_code(400);
} else {
    $islogged = $ctrlForm->loginUser($email, $password);
    $token = $ctrlForm->getJWT($islogged);
    if($token !== '') {
        $code = http_response_code(200);
        echo $code;
    }
}} else {
    $code = http_response_code(400);
    echo $code;
}
