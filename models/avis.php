<?php

/**Cette classe utilise le modèle de connection à la bdd */
require_once 'model.php';

/** hérite de la classe abstraite Model.
 * contient les méthode pour récupérer les membres.
 */

class Avis extends Model
{
    public function getAvis(): PDOStatement
    {
        $sql = 'SELECT COMMENTS_ID AS id, COMMENTS_DATE AS date,COMMENTS_AUTEUR AS auteur, COMMENTS_CONTENU AS contenu, COMMENTS_NOTE AS note, COMMENTS_STATUS AS status FROM T_COMMENTS WHERE COMMENTS_STATUS = "actif"';
        $members = $this->executerRequeteLowAccess($sql);
        return $members;
    }
    
    public function addAvis($auteur, $contenu, $note) : void {
      $sql='INSERT INTO T_COMMENTS (COMMENTS_DATE, COMMENTS_AUTEUR, COMMENTS_CONTENU,COMMENTS_NOTE,COMMENTS_STATUS)'.'VALUES(?,?,?,?,?)';
      $date = htmlentities(addslashes(date(DATE_W3C)), ENT_QUOTES, 'UTF-8');
      $status = htmlentities(addslashes('pending'), ENT_QUOTES, 'UTF-8');
      $auteurSafe = htmlentities(addslashes($auteur), ENT_QUOTES, 'UTF-8');
      $contenuSafe = htmlentities(addslashes($contenu), ENT_QUOTES, 'UTF-8');
      $noteSafe = htmlentities(addslashes($note), ENT_QUOTES, 'UTF-8');
      $this->executerRequete($sql, array($date,$auteurSafe,$contenuSafe,$noteSafe,$status));}

      public function getCommentOrdered(): PDOStatement
      {
          $sql = 'SELECT COMMENTS_ID AS id, COMMENTS_DATE AS date,COMMENTS_AUTEUR AS auteur, COMMENTS_CONTENU AS contenu, COMMENTS_NOTE AS note, COMMENTS_STATUS AS status FROM T_COMMENTS ORDER BY COMMENTS_DATE';
          $members = $this->executerRequeteLowAccess($sql);
          return $members;
      }

      public function setActifComment(int $id)
      {
          try {
              $sql = 'UPDATE T_COMMENTS SET COMMENTS_STATUS = "actif" WHERE COMMENTS_ID = ?';
              $response = $this->executerRequete($sql, array($id));
          } catch (Exception $e) {
              die($e->getMessage());
          }
      }
      
      
    public function deleteComment(int $id)
    {
        try {
            $sql = 'DELETE FROM T_COMMENTS WHERE COMMENTS_ID =?';
            $response = $this->executerRequete($sql, array($id));
            return $response;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}