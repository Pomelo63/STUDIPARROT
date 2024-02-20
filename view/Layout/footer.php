<?php
//GET ALL INFORMATIONS TO COMPLET FOOTER
require_once '../controllers/controllerInformation.php';


$footer= new ControllerInformation();
$tab = $footer->getInformation();
?>
<footer class="">
    <div class="display-flex-row footer-first-part">
        <div class="footer-info-container footer-container-border">
            <p class="footer-info-title">ADRESSE</p>
            <p id="gadress"><?= $tab['informations'][0]['street']?></p>
            <p id="gcity"><?= $tab['informations'][0]['cp']?>, <?= $tab['informations'][0]['city']?></p>
        </div>
        <div class="footer-info-container footer-container-border">
            <p class="footer-info-title">CONTACT</p>
            <p id="gemail"><?=$tab['informations'][0]['garagemail']?></p>
            <p id="gphone"><?=$tab['informations'][0]['garagephone']?></p>
        </div>
        <div class="footer-info-container footer-container-border">
            <p class="footer-info-title">HORAIRES</p>
            <div id="footer-openingtime-container"><?= $tab['informations'][0]['horaire']?></div>
        </div>
        <div class="footer-info-container">
            <p class="footer-info-title">FORMULAIRE</p>
            <a  href="<?= "index.php?action=Contact"?>" id="footer-form-button">Contact</a>
        </div>
    </div>
    <div class="display-flex-row footer-second-part">
        <div class="footer-second-container">
            <a href=""><img src="../assets/images/logo.png" alt="logo" class="header-logo-img"></a>
        </div>
        <div class="footer-second-container">
            <div class="text-align-left">Notre engagement:</div>
            <p class="text-align-left">Depuis deux ans nous travaillons à ce que nos ateliers soient un réel
                lieux de confiance
                pour nos clients. C'est pourquoi votre satisfaction est au coeur de nos préoccupations </p>
        </div>
        <div class="display-flex-column  footer-second-container">
            <div class="display-flex-column footer-nav-link-container">
                <div class="">Navigation</div>
                <a href="<?= "index.php?action=Accueil"?>#service" class="footer-nav-link">Nos prestation</a>
                <a href="<?= "index.php?action=Occasion"?>" class="footer-nav-link">Nos occasions</a>
                <a href="<?= "index.php?action=Contact"?>" class="footer-nav-link">Nous contacter</a>
                <a href="<?= "index.php?action=Accueil"?>#avis" class="footer-nav-link">Vos avis
                </a>
                <a href="<?= "index.php?action=Apropos"?>" class="footer-nav-link">A propos</a>
            </div>
        </div>
    </div>
    <div class="copyright">Copyright @2024 Parrauto - Mentions légales - Réalisation : LaBWeb studio
    </div>
</footer>
<div id="snackbar"></div>
<script src="../assets/index.js"></script>
</body>

</html>