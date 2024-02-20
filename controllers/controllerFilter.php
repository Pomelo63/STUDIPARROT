<?php

require_once '../controllers/controllerCar.php';

$minprice = $_POST['miprice'];
$maxprice = $_POST['maprice'];
$minkm = $_POST['mikm'];
$maxkm = $_POST['makm'];
$minyear = $_POST['miyear'];
$maxyear = $_POST['mayear'];
$filter = new ControllerCar();
$result = $filter->getFilter($minprice, $maxprice, $minkm, $maxkm, $minyear, $maxyear);
echo json_encode($result);