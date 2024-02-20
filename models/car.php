<?php

/**Cette classe utilise le modèle de connection à la bdd */
require_once 'model.php';



/** hérite de la classe abstraite Model.
 * contient les méthode pour récupérer les membres.
 */

class Car extends Model
{
    public function getCars()
    {
        $sql = 'select * from T_CARSFORSALE ORDER BY CARSFORSALE_DATE';
        $cars = $this->executerRequete($sql);
        return $cars;
    }

    public function getMinMaxPrice(){
     $sql ="SELECT MIN(CARSFORSALE_PRICE) AS minprice, MAX(CARSFORSALE_PRICE) AS maxprice FROM T_CARSFORSALE";
     $price  = $this->executerRequete($sql);
     return $price;
    }
    public function getMinMaxkm(){
        $sql ="SELECT MIN(CARSFORSALE_KILOMETER) AS minkm, MAX(CARSFORSALE_KILOMETER) AS maxkm FROM T_CARSFORSALE";
        $km  = $this->executerRequete($sql);
        return $km;
    }
    public function getMinMaxYear(){
        $sql ="SELECT MIN(CARSFORSALE_YEAR) AS minyear, MAX(CARSFORSALE_YEAR) AS maxyear FROM T_CARSFORSALE";
        $year  = $this->executerRequete($sql);
        return $year;
    }

    public function filterOnDB(int $minprice, int $maxprice, $minkm, $maxkm, $minyear, $maxyear){
        $sql ='SELECT * FROM T_CARSFORSALE WHERE CARSFORSALE_PRICE >= :minprice AND CARSFORSALE_PRICE <= :maxprice AND CARSFORSALE_KILOMETER >= :minkm AND CARSFORSALE_KILOMETER <= :maxkm
        AND CARSFORSALE_YEAR >= :minyear AND CARSFORSALE_YEAR <= :maxyear ORDER BY CARSFORSALE_DATE';
        $response = $this->executerRequete($sql, array('minprice' => $minprice, 'maxprice' => $maxprice,  'minkm' => $minkm, 'maxkm' => $maxkm, 'minyear' => $minyear, 'maxyear' => $maxyear));
        return $response;
    }

    public function getVehicleId(int $vehicleId): array{
     $sql= 'SELECT * FROM T_CARSFORSALE WHERE CARSFORSALE_ID = ?';
     $vehicle = $this->executerRequete($sql, array($vehicleId));
     if ($vehicle->rowCount() > 0){
      return $vehicle->fetch();
     } else {
        throw new Exception("Aucun véhicule trouvé.");
     }
    }

    public function deleteCar(int $id)
    {
        try {
            $sql = 'DELETE FROM T_CARSFORSALE WHERE CARSFORSALE_ID =?';
            $response = $this->executerRequete($sql, array($id));
            return $response;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addCar(string $ref, string $mainimg, string $imglist, string $title, int $price, int $year, string $energy, int $km, string $color, string $shift, string $gstate, string $infos)
    {
        try {
            $sql = 'INSERT INTO T_CARSFORSALE(CARSFORSALE_DATE,CARSFORSALE_REF,CARSFORSALE_MAINIMAGE,CARSFORSALE_IMAGE,CARSFORSALE_TITLE,CARSFORSALE_PRICE,CARSFORSALE_YEAR,CARSFORSALE_ENERGY,CARSFORSALE_KILOMETER,CARSFORSALE_COLOR,CARSFORSALE_GEARSHIFT,CARSFORSALE_GSTATE,CARSFORSALE_INFORMATIONS) VALUES
            (Now(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $response = $this->executerRequete($sql, array($ref,$mainimg,$imglist,$title,$price,$year,$energy,$km,$color,$shift,$gstate,$infos));
            return $response;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
