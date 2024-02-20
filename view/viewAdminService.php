<?php
require_once '../controllers/controllerService.php';

$ctrlService = new ControllerService();
$services = $ctrlService->getServices();
?>

<div class="user-title">
    <h2>GESTIONNAIRE DES SERVICES & PRESTATIONS</h2>
</div>
<div class="user-line-container">
    <div class='user-line'>
        <div class="user-box">Nom du service</div>
        <div class="user-box">Catégorie du service</div>
        <div class="user-box">Supprimer</div>
    </div>
    <div class="overflow">
        <?php
        foreach ($services['services'] as $service) :
        ?>
            <div class='user-line'>
                <div class="user-box"><?= $service['name'] ?></div>
                <div class="user-box"><?= $service['type'] ?></div>
                <div class="user-box"><i class="fa-solid fa-minus user-lass" id='<?= $service['id'] ?>' onclick="deleteService(this)"></i></div>
            </div>
        <?php endforeach; ?>
        <form class='user-line' onsubmit="return addService()">
            <div class="user-box">
                <input type="text" id="service-name" required>
            </div>
            <div class="user-box">
                <select id="category" required>
                    <option value="Mecanique">Mécanique</option>
                    <option value="Carrosserie">Carrosserie</option>
                    <option value="Entretien">Entretien</option>
                </select>
            </div>
            <div class="user-box">
                <input type="submit" id="add-new-presta" style="font-family: FontAwesome" value="&#xf067;" />

            </div>
        </form>
    </div>
</div>