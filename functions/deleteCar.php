<?php

require_once '../controllers/controllerCar.php';


$id = $_POST['id'];
$ctrlCar = new ControllerCar;
$ctrlCar->deleteCar($id);