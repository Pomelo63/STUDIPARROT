<?php
require_once '../controllers/controllerAccueil.php';
require_once '../functions/inputSecurity.php';


$ctrlForm = new ControllerAccueil();


$auteur = $_POST['auteur'];
$contenu = $_POST['contenu'];
$note = $_POST['note'];
if (verifyString($auteur, $contenu, $note) && isDigits($note)) {
    $ctrlForm->sendComment($auteur, $contenu, $note);
    $code = http_response_code(200);
    echo $code;
} else {

    $code = http_response_code(400);
    echo $code;
}
