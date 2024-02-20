<?php

require_once '../models/service.php';
require_once '../models/avis.php';
require_once '../view/view.php';

class ControllerAccueil
{
    private Service $service;
    private Avis $avis;

    public function __construct()
    {
        $this->service = new Service();
        $this->avis = new Avis();
    }




    public function showService()
    {
        $fakearray = array();
        try {
            $services = $this->service->getServices();
            $allAvis = $this->avis->getAvis();

            $allAvisFound = $allAvis->rowCount();
            $allServicesFound = $services->rowCount();
            if ($allAvisFound == 0 && $allServicesFound > 0) {
                $view = new View("Accueil");
                $view->generer(array('services' => $services, 'allAvis' => $fakearray));
                return $view;
            } else if ($allServicesFound == 0) {
                $view = new View("Accueil");
                $view->generer(array('services' => $fakearray, 'allAvis' => $allAvis));
                return $view;
            } else if ($allServicesFound > 0 && $allServicesFound > 0) {
                $view = new View("Accueil");
                $view->generer(array('services' => $services, 'allAvis' => $allAvis));
                return $view;
            }
        } catch (Exception $e) {

            $view = new View("Accueil");
            $view->generer(array('services' => $fakearray, 'allAvis' => $fakearray));
            return $view;
        }
    }



    public function sendComment($auteur, $contenu, $note): void
    {
        $this->avis->addAvis($auteur, $contenu, $note);
    }

    public function getServices()
    {
        try {
            $services = $this->service->getServices();
            $result = $services->fetchAll(\PDO::FETCH_ASSOC);
            $result = array('services' => $result);
            return $result;
        } catch (Exception $e) {
            $fakearray = array();
            $result = array('services' => $fakearray);
            return $result;
        }
    }
}
