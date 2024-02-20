<?php 
//GET ALL INFORMATIONS TO COMPLET FOOTER
require_once '../controllers/controllerInformation.php';


$footer= new ControllerInformation();

$tab = extract($footer->showInformation());
$footerInformations= [];

foreach ($informations as $information) :
    array_push($footerInformations, $information['street'],$information['cp'],$information['city'],$information['garagemail'],$information['garagephone'],$information['horaire']);
endforeach;
return json_encode($footerInformations);
?>