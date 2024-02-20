<?php

class View {
       private string $fichier;
       private string $titre;
   
       public function __construct(string $action) {

           $this->fichier = "../view/view" . $action . ".php";
       }
   
       public function generer(array $donnees): void {
           
           $contenu = $this->genererFichier($this->fichier, $donnees);
          
           $vue = $this->genererFichier('../view/global.php',
           array('titre' => $this->titre, 'contenu' => $contenu));
           echo $vue;
       }
   
       private function genererFichier(string $fichier, array $donnees): string|false {
           if (file_exists($fichier)) {
               extract($donnees);
               ob_start();
               require $fichier;
               return ob_get_clean();
           }
           else {
               throw new Exception("Fichier '$fichier' introuvable");
           }
       }
}

?>