<?php
require_once '../controllers/controllerMember.php';
require_once '../functions/inputSecurity.php';

if (verifyMailInput($_POST['userEmail'])) {
    if (verifyString($_POST['userName'], $_POST['userSurame'], $_POST['userEmail'], $_POST['userPassword'], $_POST['userFunction'], $_POST['userRight'])) {
        $userName = htmlentities(addslashes($_POST['userName']), ENT_QUOTES, 'UTF-8');
        $userSurame = htmlentities(addslashes($_POST['userSurame']), ENT_QUOTES, 'UTF-8');
        $userEmail = htmlentities(addslashes($_POST['userEmail']), ENT_QUOTES, 'UTF-8');
        $userPassword = htmlentities(addslashes($_POST['userPassword']), ENT_QUOTES, 'UTF-8');
        $userFunction = htmlentities(addslashes($_POST['userFunction']), ENT_QUOTES, 'UTF-8');
        $userRight = htmlentities(addslashes($_POST['userRight']), ENT_QUOTES, 'UTF-8');
        $passwordHashed = password_hash($userPassword, PASSWORD_BCRYPT, array('cost' => 10));
        $ctrlMember = new ControllerMember;
        $isExistEmail = $ctrlMember->getMailAdress($userEmail);
        echo $isExistEmail;
        if ($isExistEmail == 0) {
            $add = $ctrlMember->addNewUser($userName, $userSurame, $passwordHashed, $userEmail, $userFunction, $userRight);
            if ($add == 200) {
            }
        } else {
            $code =  http_response_code(400);
            echo $code;
            die();
        }
    } else {
        $code =  http_response_code(400);
        echo $code;
        die();
    }
} else {
    $code =  http_response_code(400);
    echo $code;
    die();
}
