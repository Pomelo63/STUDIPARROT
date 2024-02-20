<?php
require_once '../controllers/controllerCar.php';

        $allCars = new ControllerCar();
        $tab = $allCars->getCars();

foreach($tab['cars'] as $card) :
?>
<div class="occasion-card">
    <div class="carbon-color header-occasion-card"></div>
    <div class="occasion-card-img-container">
        <img src="../assets/uploadedfile/<?= $card['CARSFORSALE_MAINIMAGE']?>" alt="<?= $card['CARSFORSALE_TITLE']?>" class="occasion-card-img">
        <div class="occasion-card-img-price"><?= $card['CARSFORSALE_PRICE']?>€</div>
    </div>
    <div class="occasion-card-txt-container">
        <div class="occasion-card-title"><?= $card['CARSFORSALE_TITLE']?></div>
        <div class="occasion-card-desc">Année :<?= $card['CARSFORSALE_YEAR']?></div>
        <div class="occasion-card-desc">Moteur: <?= $card['CARSFORSALE_ENERGY']?></div>
        <div class="occasion-card-desc">km : <?= $card['CARSFORSALE_KILOMETER']?></div>
        <div class="occasion-card-desc">Prix : <?= $card['CARSFORSALE_PRICE']?></div>
    </div>
    <div class="carbon-color header-occasion-card-bottom"></div>
    <a href="index.php?action=Vehicle&id=<?= $card['CARSFORSALE_ID']?>" class="occasion-card-click" target="_blank" ></a>
</div>

<?php endforeach; ?>