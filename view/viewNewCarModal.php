<div class="login-modal-background" onclick="closeAddUserModal()"></div>
<div class="car-modal">
    <i class="fa-solid fa-circle-xmark redcross-modal" onclick="closeAddUserModal()"></i>
    <form method="POST" id="add-car-form" onsubmit="return addNewCar(this)">
        <div class="car-modal-input-container">
            <div class="add-car-form-main">
                <label for="cartitle">Ajouter des photos:</label>
                <input type="file" name="carpicture" id="carpicture" onchange="changeFile(this)" enctype="multipart/form-data" multiple required>
                <input type="hidden" name="pictureliste" id="pictureliste" value="">
                <div class="add-picture-box"></div>
                <label for="cartitle">Titre de l'annoce:</label>
                <input type="text" name="cartitle" id="cartitle" class="login-modal-input" required>
                <label>Prix:</label>

                <input type="text" name="carprice" id="carprice" class="login-modal-input" required>
            </div>
            <div class="add-car-form-second">
                <label>Année de mise en circulation:</label>
                <input type="text" name="caryear" id="caryear" class="login-modal-input" required>
                <label>Energie</label>
                <input type="text" name="carenergy" id="carenergy" class="login-modal-input" required>
                <label>Km au compteur:</label>
                <input type="text" name="carkm" id="carkm" class="login-modal-input" required>
                <label>Couleur de la peinture:</label>
                <input type="text" name="carcolor" id="carcolor" class="login-modal-input" required>
                <label>Type de boite à vitesse:</label>
                <input type="text" name="carshift" id="carshift" class="login-modal-input" required>
                <label>Etat général du véhicule:</label>
                <input type="text" name="carstate" id="carstate" class="login-modal-input" required>
            </div>
            <div class="add-car-form-third">
                <label>liste des options:</label>
                <textarea name="caroptions" id="caroptions" class="admin-car-textarea" maxlength="300" required></textarea>
            </div>
        </div>
        <input type="submit" value="Ajouter" id="login-button" />
    </form>
</div>