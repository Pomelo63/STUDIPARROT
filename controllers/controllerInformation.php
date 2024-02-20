<?php

require_once '../models/informations.php';

class ControllerInformation
{
    private Information $information;



    public function __construct()
    {
        $this->information = new Information();
    }

    public function showInformation()
    {
        try {
            $tab = array();
            $informations = $this->information->getInformations();
            $tab = array('informations' => $informations);
            return $tab;
        } catch (Exception $e) {
            $fakearray = array();
            $tab = array('informations' => $fakearray);
            return $tab;
        }
    }

    public function getInformation()
    {
        try {
            $tab = array();
            $informations = $this->information->getInformations();
            $result = $informations->fetchAll(\PDO::FETCH_ASSOC);
            $tab = array('informations' => $result);
            return $tab;
        } catch (Exception $e) {
            $fakearray = array();
            $tab = array('informations' => $fakearray);
            return $tab;
        }
    }

    public function modifyInformation(string $r, string $cp, string $v, string $ph, string $e, string $h)
    {
        try {
            $informations = $this->information->modifyInformation($r, $cp, $v, $e, $ph, $h);
            $code = http_response_code(200);
            echo $code;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
