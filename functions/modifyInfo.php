<?php
require_once '../controllers/controllerInformation.php';

try {
    if ($_POST['horaire'] == '' || $_POST['rue']  == '' || $_POST['cp']  == '' || $_POST['ville']  == '' || $_POST['tel']  == '' || $_POST['mail']  == ''  || ctype_space($_POST['horaire']) || ctype_space($_POST['rue']) || ctype_space($_POST['cp']) || ctype_space($_POST['ville']) || ctype_space($_POST['tel']) || ctype_space($_POST['mail'])) {
        $code = http_response_code(400);
        echo $code;
    } else
    $rue = htmlentities(addslashes($_POST['rue']), ENT_QUOTES, 'UTF-8');
    $cp = htmlentities(addslashes($_POST['cp']), ENT_QUOTES, 'UTF-8');
    $ville = htmlentities(addslashes($_POST['ville']), ENT_QUOTES, 'UTF-8');
    $tel = htmlentities(addslashes($_POST['tel']), ENT_QUOTES, 'UTF-8');
    $mail = htmlentities(addslashes($_POST['mail']), ENT_QUOTES, 'UTF-8');
    $horaire = htmlentities(addslashes($_POST['horaire']), ENT_QUOTES, 'UTF-8');
    $ctrlInformation = new ControllerInformation();
    $delete = $ctrlInformation->modifyInformation($rue,$cp,$ville,$mail,$tel,$horaire);
} catch (Exception $e) {
    die($e->getMessage());
}
