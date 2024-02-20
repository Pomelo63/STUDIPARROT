<?php $this->titre = "Garage V.Parrot"; 
?>

<script>
    var allImage = '<?= $vehicle['CARSFORSALE_IMAGE'] ;?>';
    var allImageArray = allImage.split(';');
    var ActualPicture =1;
</script>

<div class="occasion-modal" id="modal-occasion">
    <div class="carbon-color">
        <h2 class="vehicle-page-title">FICHE VEHICULE</h2>
        <div class="Vehicle-container">
            <div class="vehicle-carroussel-container">
                <div class="vehicle-carroussel-arrow" id="carroussel-left"><i class="fa-solid fa-caret-left" onclick="ActualPicture =  changePictureLeft(allImageArray,ActualPicture)"></i></div>
                <img id="vehicle-image" src="../assets/uploadedfile/<?= $vehicle['CARSFORSALE_MAINIMAGE']; ?>" alt="<?= $vehicle['CARSFORSALE_TITLE']; ?>" class="vehicle-carroussel-img">
                <div class="vehicle-carroussel-arrow" id="carroussel-right"><i class="fa-solid fa-caret-right"  onclick="ActualPicture =  changePictureRight(allImageArray,ActualPicture)"></i></div>
            </div>
            <div class="vehicle-information-container">
                <div class="vehicle-title"><?= $vehicle['CARSFORSALE_TITLE']; ?></div>
                <div class="vehicle-price"><?= $vehicle['CARSFORSALE_PRICE']; ?>€</div>
                <div class="vehicle-main-information">
                    <div class="">
                        <div class=""><i class="fa-solid fa-calendar"></i>: <?= $vehicle['CARSFORSALE_YEAR']; ?></div>
                        <div class=""><i class="fa-solid fa-bolt"></i>: <?= $vehicle['CARSFORSALE_ENERGY']; ?></div>
                        <div class=""><i class="fa-solid fa-tachograph-digital"></i>: <?= $vehicle['CARSFORSALE_KILOMETER']; ?></div>
                    </div>
                    <div class="">
                        <div class=""><i class="fa-solid fa-palette"></i>: <?= $vehicle['CARSFORSALE_COLOR']; ?></div>
                        <div class="m">Boite: <?= $vehicle['CARSFORSALE_GEARSHIFT']; ?></div>
                        <div class=""><i class="fa-solid fa-car-rear"></i>: <?= $vehicle['CARSFORSALE_GSTATE']; ?></div>
                    </div>
                </div>
                <div class="">Informations supplémentaires:</div>
                <div class="vehicle-other-informations">
                    <?= $vehicle['CARSFORSALE_INFORMATIONS']; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-contact-page">
    <h2 class="contact-page-title">NOUS CONTACTER</h2>
    <div class="contact-section-container">
        <section class="contact-section-info">
            <img class="contact-section-img" src="../assets/images/contact.jpeg" alt="">
            <div class="contact-section-img-surground"></div>
            <div id="contact-section-txt">
                <div class="line-contact-icon">NOS HORAIRES</div>
                <div class="line-contact-icon"></div>
                <div class="line-contact-icon">CONTACTEZ-NOUS</div>
                <div class="line-contact-icon"><i class="fa-solid fa-phone contact-icon-space"></i><br /><i class="fa-solid fa-envelope contact-icon-space"></i><br /><i class="fa-solid fa-location-dot contact-icon-space"></i></div>
            </div>
        </section>
        <section class="contact-section-form">
            <div>Pour nous contacter, merci de renseigner le formulaire ci-dessous.</div>
            <form onsubmit="return postMail()" method="POST" class="contact-form">
                <div class="">
                    <label for="cname" class="contact-form-label">Nom: </label>
                    <input class="contact-form-input" type="text" name="cname" id="cname" required />
                </div>
                <div class="">
                    <label for="csurname" class="contact-form-label">Prénom: </label>
                    <input class="contact-form-input" type="text" name="csurname" id="csurname" required />
                </div>
                <div class="">
                    <label for="cmail" class="contact-form-label">Email: </label>
                    <input class="contact-form-input" type="text" name="cmail" id="cmail" required />
                </div>
                <div class="">
                    <label for="cphone" class="contact-form-label">Tel: </label>
                    <input class="contact-form-input" type="text" name="cphone" id="cphone" required />
                </div>
                <div class="">
                    <label for="csujet" class="contact-form-label">Sujet: </label>
                    <input class="contact-form-input" type="text" name="csujet" id="csujet" value="L'annonce <?= $vehicle['CARSFORSALE_REF']; ?> m'intéresse." disabled required />
                </div>
                <div class="">
                    <label for="cmsg" class="">Message:</label>
                    <textarea id="cmsg" name="cmsg" class="contact-form-input-area" maxlength="300" required></textarea>
                </div>
                <input type="submit" value="Envoyer" class="button-primary" />
            </form>
        </section>
    </div>
</div>