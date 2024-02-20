<?php
require_once '../controllers/controllerCar.php';
require_once '../functions/inputSecurity.php';


if (isset($_POST) && isset($_FILES)) {
    if (verifyString($_POST['cartitle'], $_POST['carprice'], $_POST['caryear'], $_POST['carenergy'], $_POST['carkm'], $_POST['carcolor'], $_POST['carstate'], $_POST['caroptions'], $_POST['carshift']) && isDigits($_POST['carkm']) && isDigits($_POST['caryear'] && isDigits($_POST['carprice']))) {
        try {
            $fileToUpload = count($_FILES) - 1;
            $mainimg =  deleteAccents($_FILES['file0']['name']);
            $imglist = '';
            for ($i = 0; $i < $fileToUpload; $i++) {
                if ($imglist == '') {
                    $imglist = deleteAccents($_FILES['file' . $i]['name']);
                } else {
                    $imglist = $imglist . ';' .  deleteAccents($_FILES['file' . $i]['name']);
                }
            }
            $title =  htmlentities(addslashes($_POST['cartitle']), ENT_QUOTES, 'UTF-8');
            $price =  htmlentities(addslashes($_POST['carprice']), ENT_QUOTES, 'UTF-8');
            $year = htmlentities(addslashes($_POST['caryear']), ENT_QUOTES, 'UTF-8');
            $energy = htmlentities(addslashes($_POST['carenergy']), ENT_QUOTES, 'UTF-8');
            $km = htmlentities(addslashes($_POST['carkm']), ENT_QUOTES, 'UTF-8');
            $color = htmlentities(addslashes($_POST['carcolor']), ENT_QUOTES, 'UTF-8');
            $gear = htmlentities(addslashes($_POST['carshift']), ENT_QUOTES, 'UTF-8');
            $gstate = htmlentities(addslashes($_POST['carstate']), ENT_QUOTES, 'UTF-8');
            $options = htmlentities(addslashes($_POST['caroptions']), ENT_QUOTES, 'UTF-8');
            $time = time();
            $ref = 'REF' . $time;
            $path = '../assets/uploadedfile/';

            for ($i = 0; $i < $fileToUpload; $i++) {
                if (file_exists($path . deleteAccents($_FILES['file' . $i]['name']))) {
                    $code = 'error_file_name';
                    $fileName = $_FILES['file' . $i]['name'];
                    echo json_encode(array($code,$fileName));
                    die();
                }
            }
            $ctrlCar = new ControllerCar;
            $add = $ctrlCar->addCar($ref, $mainimg, $imglist, $title, $price, $year, $energy, $km, $color, $gear, $gstate, $options);
            if ($add == 200) {


                for ($i = 0; $i < $fileToUpload; $i++) {
                    $name = deleteAccents($_FILES['file' . $i]['name']);
                    move_uploaded_file($_FILES['file' . $i]['tmp_name'], $path . $name);
                }
                $code ='ok';
                echo json_encode($code);
                die();
            } else {
                $code = 'sql_impossible';
                echo json_encode($code);
                die();
            }
        } catch (Exception $e) {
            $code = 'non';
            echo json_encode($code);
            die();
        }
    } else {
        $code = 'input_error';
        echo json_encode($code);
        die();
    }
}
