<?php
require_once '../public/index.php';
require_once 'controllerAccueil.php';
require_once 'controllerCar.php';
require_once './controllers/jwt.php';

class Router
{

    private ControllerAccueil $ctrlAccueil;
    private ControllerCar $ctrlCar;
    private JWT $jwt;

    public function __construct()
    {
        $this->ctrlAccueil = new ControllerAccueil();
        $this->ctrlCar = new ControllerCar();
        $this->jwt = new JWT();
    }

    public function routerRequest(): void
    {


        try {
            if (isset($_GET['action'])) {
                if (htmlentities(addslashes($_GET['action']), ENT_QUOTES, 'UTF-8') == 'Accueil') {
                    $this->ctrlAccueil->showService();
                } else if (htmlentities(addslashes($_GET['action']), ENT_QUOTES, 'UTF-8') == 'Apropos') {
                    $view = new View("Apropos");
                    $view->generer(array('aPropos'));
                } else if (htmlentities(addslashes($_GET['action']), ENT_QUOTES, 'UTF-8') == 'Contact') {
                    $view = new View("Contact");
                    $view->generer(array('contact'));
                } else if (htmlentities(addslashes($_GET['action']), ENT_QUOTES, 'UTF-8') === 'Occasion') {
                    $view = new View("Occasion");
                    $view->generer(array('Occasion'));
                } else if (htmlentities(addslashes($_GET['action']), ENT_QUOTES, 'UTF-8') == 'Vehicle') {
                    if (intval($_GET['id']) != 0) {
                        $this->ctrlCar->getvehicle($_GET['id']);
                    } else {
                        throw new Exception("Vehicule introuvable");
                    }
                } else if (htmlentities(addslashes($_GET['action']), ENT_QUOTES, 'UTF-8') == 'Admin') {
                    if (isset($_COOKIE['access_token'])) {
                        $veryfiedjwt = $this->jwt->verifyJWT($_COOKIE['access_token']);
                        $actifjwt = $this->jwt->isActif($_COOKIE['access_token']);
                        if ($actifjwt === false && $veryfiedjwt == 1) {
                            $view = new View("Admin");
                            $view->generer(array('Admin'));
                        } else {
                            $this->ctrlAccueil->showService();
                        }
                    } else {
                        $this->ctrlAccueil->showService();
                    }
                } else {
                    throw new Exception("Action non valide");
                }
            } else {
                $this->ctrlAccueil->showService();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    private function erreur(string $msgErreur): void
    {
        $view = new View("Error");
        $view->generer(array('msgErreur' => $msgErreur));
    }

    private function getParameter($array, $nom): string
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else {
            throw new Exception("Paramètre introuvable");
        }
    }
}
