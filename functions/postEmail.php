<?php

require_once '../controllers/controllerInformation.php';


$informations = new ControllerInformation();

$tab = extract($informations->showInformation());
$allInformations = [];

foreach ($informations as $information) :
    array_push($allInformations, $information['street'], $information['cp'], $information['city'], $information['garagemail'], $information['garagephone'], $information['horaire']);
endforeach;
$myemail = $allInformations[0][3];
if (preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $_POST['email'])) {
    $name = htmlentities(addslashes($_POST['name']), ENT_QUOTES, 'UTF-8');
    $surname = htmlentities(addslashes($_POST['surname']), ENT_QUOTES, 'UTF-8');
    $email = $_POST['email'];
    $phone = htmlentities(addslashes($_POST['phone']), ENT_QUOTES, 'UTF-8');
    $subject = htmlentities(addslashes($_POST['subject']), ENT_QUOTES, 'UTF-8');
    $message = htmlentities(addslashes($_POST['message']), ENT_QUOTES, 'UTF-8');

    $fakemail = 'shamayabluesummers@gmail.com';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: ' . $email . "\r\n";
    $headers .= 'Reply-to: ' . $email;
    if (mail($fakemail, $subject, $message, $headers)) {
        echo 'mail envoyé';
    } else {
        echo 'Erreur veuillez recommencer';
    }
} else {
    http_response_code(400);
    echo 'Adress mail invalide';
}
