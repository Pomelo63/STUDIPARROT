<?php

/**Cette classe utilise le modèle de connection à la bdd */
require_once 'model.php';

/** hérite de la classe abstraite Model.
 * contient les méthode pour récupérer les services proposés par le garage.
 */

class Service extends Model
{
    public function getServices(): PDOStatement
    {
        $sql = 'SELECT PRESTA_ID AS id, PRESTA_TYPE AS type,PRESTA_NAME AS name FROM T_PRESTATIONS';
        $members = $this->executerRequeteLowAccess($sql);
        return $members;
    }

    public function deleteService(int $id)
    {
        try {
            $sql = 'DELETE FROM T_PRESTATIONS WHERE PRESTA_ID =?';
            $response = $this->executerRequete($sql, array($id));
            return $response;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addNewService(string $category, string $name)
    {
        try {
            $sql = 'INSERT INTO T_PRESTATIONS (PRESTA_TYPE, PRESTA_NAME) VALUES
           (?, ?)';
            $response = $this->executerRequete($sql, array($category, $name));
            return $response;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}