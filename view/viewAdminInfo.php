<?php
//GET ALL INFORMATIONS TO COMPLET FOOTER
require_once '../controllers/controllerInformation.php';
$footer = new ControllerInformation();
$tab = $footer->getInformation();
?>
<div class="user-title">
    <h2>GESTIONNAIRE DES DONNEES DE CONTACT</h2>
</div>
<div class="overflow">
    <form method="post" onsubmit="return modifyInformation(this)" class="form-info-admin">
        <label for="horaire">Horaire:</label>
        <textarea name="horaire" id="garage-h" class="admin-info-textarea" maxlength="300" required><?= $tab['informations'][0]['horaire'] ?></textarea>
        <div>
            <label>Rue:</label>
            <input type="text" name="rue" id="garage-r" class="modal-admin-input" value="<?= $tab['informations'][0]['street'] ?>" required>
        </div>
        <div>
            <label>Code postal:</label>
            <input type="text" name="cp" id="garage-cp" class="modal-admin-input" value="<?= $tab['informations'][0]['cp'] ?>" required>
        </div>
        <div>
            <label>Ville:</label>
            <input type="text" name="ville" id="garage-v" class="modal-admin-input" value="<?= $tab['informations'][0]['city'] ?>" required>
        </div>
        <div>
            <label>Téléphone:</label>
            <input type="text" name="phone" id="garage-ph" class="modal-admin-input" value="<?= $tab['informations'][0]['garagephone'] ?>" required>
        </div>
        <div>
            <label>Adresse email:</label>
            <input type="text" name="mail" id="garage-e" class="modal-admin-input" value="<?= $tab['informations'][0]['garagemail'] ?>" required>
        </div>
        <input type="submit" value="Modifier" id="information-button" />
    </form>
</div>