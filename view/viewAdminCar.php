<?php
require_once '../controllers/controllerCar.php';
$allCars = new ControllerCar();
$tab = $allCars->getCars();
?>
<div class="user-title">
    <h2>GESTIONNAIRE D'ANNONCE VEHICULE OCCASION</h2>
    <div><i class="fa-solid fa-car" id="add-new-user" onclick="newCarModal()"></i></div>
</div>
<div class="admin-car-card-container">
    <div class='user-line displayed-line'>
        <div class="user-box">Image</div>
        <div class="user-box">carroussel</div>
        <div class="user-box">Référence & titre</div>
        <div class="user-box">Information principale</div>
        <div class="user-box">Information secondaire</div>
        <div class="user-box">action</div>
    </div>
    <div class="overflow">
        <?php
        foreach ($tab['cars'] as $card) :
        ?>

            <div class='user-line  admin-car-line'>
                <div class="user-box">
                    <img src="../assets/uploadedfile/<?= $card['CARSFORSALE_MAINIMAGE'] ?>" alt="<?= $card['CARSFORSALE_TITLE'] ?>" class="occasion-card-img">
                </div>
                <div class="user-box">

                    <?php
                    $images = explode(';', $card['CARSFORSALE_IMAGE']);
                    foreach ($images as $img) : ?>
                        <img src="../assets/uploadedfile/<?= $img ?>" alt="<?= $img ?>" class="little-picture">
                    <?php endforeach; ?>
                </div>
                <div class="user-box">
                    <div><?= $card['CARSFORSALE_REF'] ?></div>
                    <div><?= $card['CARSFORSALE_DATE'] ?></div>
                    <div><?= $card['CARSFORSALE_TITLE'] ?></div>   
                </div>
                <div class="user-box">
                    <div>Année :<?= $card['CARSFORSALE_YEAR'] ?></div>
                    <div>Moteur: <?= $card['CARSFORSALE_ENERGY'] ?></div>
                    <div>km : <?= $card['CARSFORSALE_KILOMETER'] ?></div>
                    <div>Prix : <?= $card['CARSFORSALE_PRICE'] ?></div>
                    <div>Energie : <?= $card['CARSFORSALE_ENERGY'] ?></div>
                    <div>Couleur : <?= $card['CARSFORSALE_COLOR'] ?></div>
                    <div>Boite : <?= $card['CARSFORSALE_GEARSHIFT'] ?></div>
                    <div>Etat : <?= $card['CARSFORSALE_GSTATE'] ?></div>
                </div>
                <div class="user-box"><?= $card['CARSFORSALE_INFORMATIONS']; ?></div>
                <div class="user-box">
                    <a href="index.php?action=Vehicle&id=<?= $card['CARSFORSALE_ID'] ?>" class="car-action-container" target="_blank"><i class="fa-solid fa-eye"></i></a>
                    <div class="car-action-container"><i class="fa-solid fa-trash admin-car-icon icon-car-red" id="<?= $card['CARSFORSALE_ID']; ?>" onclick="deleteCar(this)"></i></div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>