<?php

/**Cette classe utilise le modèle de connection à la bdd */
require_once 'model.php';



/** hérite de la classe abstraite Model.
 * contient les méthode pour récupérer les membres.
 */

class Member extends Model
{
    public function getMembers(): PDOStatement
    {
        $sql = 'SELECT MEMBER_ID AS id, MEMBER_NAME AS name,MEMBER_SURNAME AS surname, MEMBER_PASSWORD AS password, MEMBER_EMAIL AS email , MEMBER_FUNCTION AS function, MEMBER_PROFIL AS profil from T_MEMBERS';
        $members = $this->executerRequete($sql);
        return $members;
    }

    public function findMember(string $email, string $password)
    {
        try {
            $sql = "SELECT * FROM T_MEMBERS WHERE  MEMBER_EMAIL = ?";
            $emailSafe = htmlentities(addslashes($email), ENT_QUOTES, 'UTF-8');
            $passwordSafe = htmlentities(addslashes($password), ENT_QUOTES, 'UTF-8');
            $response = $this->executerRequete($sql, array($emailSafe));
            $result = $response->fetchAll(\PDO::FETCH_ASSOC);
            $memberFound = $response->rowCount();
            if ($memberFound > 0) {
                if (password_verify($passwordSafe, $result[0]['MEMBER_PASSWORD'])) {
                    return $result;
                } else {
                    http_response_code(400);
                    exit();
                }
            } else {

                http_response_code(400);
                exit();
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteUser(int $id)
    {
        try {
            $sql = 'DELETE FROM T_MEMBERS WHERE MEMBER_ID =?';
            $response = $this->executerRequete($sql, array($id));
            return $response;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addNewUser(string $uname, string $usurname, string $uemail, string $upassword, string $ufunction, string $uright)
    {
        try {
            $sql = 'INSERT INTO T_MEMBERS(MEMBER_NAME, MEMBER_SURNAME, MEMBER_PASSWORD,MEMBER_EMAIL,MEMBER_FUNCTION,MEMBER_PROFIL) VALUES
           (?, ?, ? , ?, ?, ?)';
            $response = $this->executerRequete($sql, array($uname, $usurname, $uemail, $upassword, $ufunction, $uright));
            return $response;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getMailAdress(string $mail)
    {
        try {
            $sql =  "SELECT * FROM T_MEMBERS WHERE  MEMBER_EMAIL = ?";
            $response = $this->executerRequete($sql, array($mail));
            $memberFound = $response->rowCount();
            if ($memberFound == 0) {
                echo $memberFound;
            } else {
                $code = http_response_code(400);
                echo $code;
                exit();
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
