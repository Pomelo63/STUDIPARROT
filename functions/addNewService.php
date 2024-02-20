<?php
require_once '../controllers/controllerService.php';

try {
    if ($_POST['category'] == '' || $_POST['name']  == '' || ctype_space($_POST['category']) || ctype_space($_POST['name'])) {
        $code = http_response_code(400);
        echo $code;
    } else {
        $category = htmlentities(addslashes($_POST['category']), ENT_QUOTES, 'UTF-8');
        $name = htmlentities(addslashes($_POST['name']), ENT_QUOTES, 'UTF-8');
        $ctrlService = new ControllerService;
        $result = $ctrlService->addNewService($category, $name);
    }
} catch (Exception $e) {
}
