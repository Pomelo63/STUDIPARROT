<?php

/** Classe abstraite model
 * centralise les donné d'accès à une base de donnée
 * utilise l'API PDO
 */


abstract class Model
{
    /** Objet PDO d'accès à la BD */
    private $bdd;

    /**
     * Exécute une requête SQL éventuellement paramétrée
     * 
     * @param string $sql La requête SQL
     * @param array $valeurs Les valeurs associées à la requête
     * @return PDOStatement Le résultat renvoyé par la requête
     */
    protected function executerRequete(string $sql, array $params = null): PDOStatement
    {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql); // exécution directe
        } else {
            $resultat = $this->getBdd()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    /**
     * Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
     * 
     * @return PDO L'objet PDO de connexion à la BDD
     */
    private function getBdd()
    {
        if ($this->bdd == null) {
            if (getenv('JAWSDB_URL') !== false) {
                $dbparts = parse_url(getenv('JAWSDB_URL'));
                $hostname = $dbparts['host'];
                $username = $dbparts['user'];
                $password = $dbparts['pass'];
                $database = ltrim($dbparts['path'], '/');
            } else {
                $hostname = 'localhost';
                $database = 'vparrot';
                $username = 'root';
                $password = '';
            }
            // Création de la connexion
            $this->bdd = new PDO("mysql:host=$hostname;dbname=$database", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        }
        return $this->bdd;
    }

    private $bddLowAccess;

    /**
     * Exécute une requête SQL éventuellement paramétrée
     * 
     * @param string $sql La requête SQL
     * @param array $valeurs Les valeurs associées à la requête
     * @return PDOStatement Le résultat renvoyé par la requête
     */
    protected function executerRequeteLowAccess(string $sql, array $params = null): PDOStatement
    {
        if ($params == null) {
            $resultat = $this->getBddLowAccess()->query($sql); // exécution directe
        } else {
            $resultat = $this->getBddLowAccess()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    /**
     * Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
     * 
     * @return PDO L'objet PDO de connexion à la BDD
     */
    private function getBddLowAccess()
    {
        if ($this->bddLowAccess == null) {
            if (getenv('JAWSDB_URL') !== false) {
                $dbparts = parse_url(getenv('JAWSDB_URL'));
                $hostname = $dbparts['host'];
                $username = $dbparts['user'];
                $password = $dbparts['pass'];
                $database = ltrim($dbparts['path'], '/');
            } else {
                $hostname = 'localhost';
                $database = 'vparrot';
                $username = 'root';
                $password = '';
            }
            // Création de la connexion
            $this->bddLowAccess =new PDO("mysql:host=$hostname;dbname=$database", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            
        }
        return $this->bddLowAccess;
    }
}
