<?php
require_once '../controllers/jwt.php';
$jwt = new JWT();

if (!isset($_COOKIE['access_token']) || !isset($_GET['action']) == 'Admin') {
    header('location: ../public/index.php');
    die();
} else {
    $veryfiedjwt = $jwt->verifyJWT($_COOKIE['access_token']);
    $actifjwt = $jwt->isActif($_COOKIE['access_token']);
    $jwtright = $jwt->getAdminRight($_COOKIE['access_token']);
    if ($actifjwt === false && $veryfiedjwt == 1) {
        $this->titre = "Garage V.Parrot"; ?>

        <div class="admin-pannel" id="admin-pannel">
            <div class="display-flex panel-bar">
                <div class="admin-pannel-title">Listes des commmandes :</div>
                <?php if($jwtright === 'admin'){?>
                <div class="admin-option" id="admin-member" onclick="userView()"><i class="fa-solid fa-user" onclick="userView()"></i></div>
                <div class="admin-option" id="admin-calendar" onclick="informationView()"><i class="fa-solid fa-calendar-days" onclick="informationView()"></i></div>
                <div class="admin-option" id="admin-services" onclick="prestaView()"><i class="fa-solid fa-screwdriver-wrench" onclick="prestaView()"></i></div>
                <?php } ?>
                <div class="admin-option" id="admin-car" onclick="carView()"><i class="fa-solid fa-car"></i></div>
                <div class="admin-option" id="admin-comment" onclick="commentView()"><i class="fa-solid fa-comment" onclick="commentView()"></i></div>
            </div>
        </div>
        <div class="admin-window" id="admin-window">
            <div id="admin-window-content">
                <div class="admin-welcom-msg">BIENVENUE DANS VOTRE ESPACE DE GESTION.</div>
            </div>
        </div>
        <div id="modal-admin"></div>
        <script src="../assets/admin.js"></script>

<?php
    } else {
        unset($_COOKIE[$cookie_name]);
        setcookie($cookie_name, '', time() - 3600, "/");
        header('location: ../public/index.php');
        die();
    }
} ?>