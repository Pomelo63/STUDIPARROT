<?php

/**Cette classe utilise le modèle de connection à la bdd */
require_once 'Model.php';

/** hérite de la classe abstraite Model.
 * contient les méthode pour récupérer les services proposés par le garage.
 */

class Information extends Model
{
    public function getInformations(): PDOStatement
    {
        try {
            $sql = 'select INFO_STREET as street,INFO_CP as cp,INFO_CITY as city,INFO_EMAIL as garagemail,INFO_PHONE as garagephone,INFO_HOUR as horaire from T_INFORMATIONS';
            $informations = $this->executerRequeteLowAccess($sql);
            return $informations;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function modifyInformation(string $r, string $cp, string $v, string $ph, string $e, string $h)
    {
        try {
            $sql = 'UPDATE T_INFORMATIONS SET INFO_STREET = ?, INFO_CP = ?, INFO_CITY = ?, INFO_EMAIL = ?, INFO_PHONE = ?, INFO_HOUR = ? WHERE INFO_NAME = "VPARROT"';
            $response = $this->executerRequete($sql, array($r, $cp, $v, $e, $ph, $h));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
