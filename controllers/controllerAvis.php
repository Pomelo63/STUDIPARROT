<?php

require_once '../models/avis.php';
require_once '../view/view.php';

class ControllerAvis
{
    private Avis $avis;

    public function __construct()
    {
        try {
            $this->avis = new Avis();
        } catch (Exception $e) {
            die();
        }
    }




    public function sendComment(string $auteur, string $contenu, int $note): void
    {
        $this->avis->addAvis($auteur, $contenu, $note);
    }

    public function getCommentOrdered()
    {
        try {
            $allAvis = $this->avis->getCommentOrdered();
            $result = $allAvis->fetchAll(\PDO::FETCH_ASSOC);
            $result = array('avis' => $result);
            return $result;
        } catch (Exception $e) {
            die();
        }
    }

    public function setActifComment(int $id)
    {
        try {
            $deletUser = $this->avis->setActifComment($id);
            $code = http_response_code(200);
            echo $code;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteComment(int $id)
    {
        try {
            $deletUser = $this->avis->deleteComment($id);
            $code = http_response_code(200);
            echo $code;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
