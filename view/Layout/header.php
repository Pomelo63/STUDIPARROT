<?php
require_once '../controllers/jwt.php';

$jwt = new JWT();
?>


<header class="display-flex-row header">
    <div class="">
        <a href="<?= "index.php?action=Accueil" ?>"><img src="../assets/images/logo.png" alt="logo" class="header-logo-img"></a>
    </div>
    <nav class="header-nav-bar display-flex-row">
        <a href="<?= "index.php?action=Accueil" ?>#service" class="red-overline">Nos prestations</a>
        <a href="<?= "index.php?action=Occasion" ?>" class="red-overline">Nos occasions</a>
        <a href="<?= "index.php?action=Contact" ?>" class="color-white red-overline">Nous contacter</div>
            <a href="<?= "index.php?action=Accueil" ?>#avis" class="red-overline">Vos avis</a>
            <a href="<?= "index.php?action=Apropos" ?>" class="red-overline">A propos</a>
            <?php
            if (!isset($_COOKIE['access_token'])) {
            } else {
                $veryfiedjwt = $jwt->verifyJWT($_COOKIE['access_token']);
                $actifjwt = $jwt->isActif($_COOKIE['access_token']);
                $jwtright = $jwt->getAdminRight($_COOKIE['access_token']);
                if ($actifjwt === false && $veryfiedjwt == 1) { ?>
                    <a href="<?= "index.php?action=Admin" ?>" class="color-white red-overline" id="admin-header">Espace Pro</a>
            <?php }
            } ?>
            <div id="connexion" onclick="showLoginModal()" class=" red-overline"><i class="fa-solid fa-user"></i></div>
    </nav>
</header>