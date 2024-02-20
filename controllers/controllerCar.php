<?php

require_once '../models/car.php';
require_once '../view/view.php';



class ControllerCar
{
    private Car $car;

    public function __construct()
    {
        $this->car = new Car();
    }

    public function getCars()
    {
        try {
            $tab = array();
            $allCars = $this->car->getCars();
            $result =  $allCars->fetchAll(\PDO::FETCH_ASSOC);
            $tab = array('cars' => $result);
            return $tab;
        } catch (Exception $e) {
            $fakearray = array();
            $tab = array('cars' => $fakearray);
            return $tab;
        }
    }

    public function getMinMax()
    {
        try {
            $tab = array();
            $minMaxPrice = $this->car->getMinMaxPrice();
            $minMaxKm = $this->car->getMinMaxKm();
            $minMaxYear = $this->car->getMinMaxYear();
            $minMaxPrice =  $minMaxPrice->fetchAll(\PDO::FETCH_ASSOC);
            $minMaxKm =  $minMaxKm->fetchAll(\PDO::FETCH_ASSOC);
            $minMaxYear =  $minMaxYear->fetchAll(\PDO::FETCH_ASSOC);
            $tab = array('price' => $minMaxPrice, 'km' => $minMaxKm, 'year' => $minMaxYear);
            return $tab;
        } catch (Exception $e) {
            $fakearray = array();
            $tab = array('price' => $fakearray, 'km' => $fakearray, 'year' => $fakearray);
            return $tab;
        }
    }

    public function getFilter(int $minprice, int $maxprice,int $minkm,int $maxkm,int $minyear,int $maxyear)
    {
        try {
            $filter = $this->car->filterOnDB($minprice, $maxprice, $minkm, $maxkm, $minyear, $maxyear);
            $result = $filter->fetchAll(\PDO::FETCH_ASSOC);
            $tab = array('cars' => $result);
            return $result;
        } catch (Exception $e) {
            $fakearray = array();
            $tab = array('cars' => $fakearray);
            return $tab;
        }
    }

    public function getvehicle(int $vehicleId){
        $vehicle = $this->car->getVehicleId($vehicleId);
        $view = new View("Vehicle");
        $view->generer(array('vehicle' => $vehicle));
        return $view;
    }

    public function deleteCar(int $id)
    {
        try {
            $deletService = $this->car->deleteCar($id);
            $code = http_response_code(200);
            echo $code;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addCar(string $ref, string $mainimg, string $imglist, string $title, int $price, int $year, string $energy, int $km, string $color, string $shift, string $gstate, string $infos)
    {
        try {
            $response = $this->car->addCar($ref,$mainimg,$imglist,$title,$price,$year,$energy,$km,$color,$shift,$gstate,$infos);
            $code = http_response_code(200);
            return $code;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
