<?php $this->titre = "Garage V.Parrot"; 
?>

<?php require_once '../functions/getFooterInformation.php';
?>
<div class="main-contact-page">
    <h2 class="contact-page-title">NOUS CONTACTER</h2>
    <div class="contact-section-container">
        <section class="contact-section-info">
            <img class="contact-section-img" src="../assets/images/contact.jpeg" alt="">
            <div class="contact-section-img-surground"></div>
            <div id="contact-section-txt">
                <div class="line-contact-icon">NOS HORAIRES</div>
                <div class="line-contact-icon"><?= $footerInformations[5]?></div>
                <div class="line-contact-icon">CONTACTEZ-NOUS</div>
                <div class="line-contact-icon"><i class="fa-solid fa-phone contact-icon-space"></i><?= $footerInformations[4]?><br /><i class="fa-solid fa-envelope contact-icon-space"></i><?= $footerInformations[3]?><br /><i class="fa-solid fa-location-dot contact-icon-space"></i><?= $footerInformations[0]?><br/><?= $footerInformations[1]?>, <?= $footerInformations[2]?></div>
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
                    <input class="contact-form-input" type="text" name="csujet" id="csujet" required />
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