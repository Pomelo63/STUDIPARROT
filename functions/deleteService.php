<?php

require_once '../controllers/controllerService.php';


$id = $_POST['id'];
$ctrlService = new ControllerService;
$ctrlService->deleteService($id);