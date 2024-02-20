<?php

require '../controllers/controllerAvis.php';

$id=$_POST['id'];
$ctrlComment = new ControllerAvis();
$ctrlComment->setActifComment($id);

