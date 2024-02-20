<?php

require_once '../controllers/controllerMember.php';


$id = $_POST['id'];
$ctrlMember = new ControllerMember;
$delete = $ctrlMember->deleteUser($id);