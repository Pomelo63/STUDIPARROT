<?php $this->titre = "Garage V.Parrot";
?>

<section class="main-img-container">
    <img src="../assets/images/main.jpeg" alt="SUV dans le noir" id="main-img">
    <div class="main-img-black-filter"></div>
    <h1 class="main-img-txt">"Notre mission, vous garantir la <pan>performance</pan> et la <pan>sécurité</pan> de votre véhicule." </h1>
</section>

<section id="service">
    <h2 class="main-text-color">NOS SERVICES</h2>
    <p class="prestation-txt-p">Panne électrique, casse moteur, entretient périodique ou petit aléa climatique?
        Peu importe ce qui vous amène chez nous. Nous trouverons une solution pour satisfaire votre besoin.
        Grâce à nos multiples ateliers et à notre équipe de choc nous viendrons à bout de tous vos problèmes!</p>

    <div class="service-container">
        <?php
        $prestaArray = array();
        $avisArray = array();
        //Boucle sur tous les billets
        if (!empty($services)) {

            foreach ($services as $service) :
                array_push($prestaArray, [$service['name'], $service['type']]);
            endforeach; ?>

            <article class="service-article">
                <img src='../assets/images/mecanic.jpeg' alt="moteur de véhicule" class="service-img" />
                <div class="txt-resize-service">
                    <h3 class="service-article-title">Mécanique</h3>
                    <div class="service-article-txt">

                        <?php
                        foreach ($prestaArray as $presta) :
                            if ($presta[1] == "Mecanique") {
                        ?>
                                <p><?php echo $presta[0]; ?></p>
                        <?php }
                        endforeach; ?>
                    </div>
                </div>
                <div class="carbon-color service-article-footer"></div>
            </article>
            <article class="service-article">
                <img src='../assets/images/entretient.jpeg' alt="jante d'une voiture" class="service-img" />
                <div class="txt-resize-service">
                    <h3 class="service-article-title">Entretien</h3>
                    <div class="service-article-txt">
                        <?php
                        foreach ($prestaArray as $presta) :
                            if ($presta[1] == "Entretien") {
                        ?>
                                <p><?php echo $presta[0]; ?></p>
                        <?php }
                        endforeach; ?>
                    </div>
                </div >
                <div class="carbon-color service-article-footer"></div>
            </article>

            <article class="service-article">
                <img src='../assets/images/carrosserie.jpeg' alt="parchoc avant en peinture" class="service-img" />
                <div class="txt-resize-service">
                    <h3 class="service-article-title">Carrosserie</h3>
                    <div class="service-article-txt">
                        <?php
                        foreach ($prestaArray as $presta) :
                            if ($presta[1] == "Carrosserie") {
                        ?>
                                <p><?php echo $presta[0]; ?></p>
                        <?php }
                        endforeach; ?>
                    </div>
                </div>
                <div class="carbon-color service-article-footer"></div>
            </article>
        <?php } else { ?>
            <article class="service-article">
                <img src='../assets/images/mecanic.jpeg' alt="moteur de véhicule" class="service-img" />
                <div class="txt-resize-service">
                    <h3 class="service-article-title">Mécanique</h3>
                    <div class="service-article-txt">
                        <p></p>
                    </div>
                </div>
                <div class="carbon-color service-article-footer"></div>
            </article>
            <article class="service-article">
                <img src='../assets/images/entretient.jpeg' alt="jante d'une voiture" class="service-img" />
                <div class="txt-resize-service">
                    <h3 class="service-article-title">Entretien</h3>
                    <div class="service-article-txt">
                        <p></p>
                    </div>
                </div>
                <div class="carbon-color service-article-footer"></div>
            </article>

            <article class="service-article">
                <img src='../assets/images/carrosserie.jpeg' alt="parchoc avant en peinture" class="service-img" />
                <div class="txt-resize-service">
                    <h3 class="service-article-title">Carrosserie</h3>
                    <div class="service-article-txt">
                        <p></p>
                    </div>
                </div>
                <div class="carbon-color service-article-footer"></div>
            </article>

        <?php } ?>

        <article class="service-article">
            <a href="<?= "index.php?action=Occasion" ?>" class="display-flex-link">
                <img src='../assets/images/occasion.jpeg' alt="Véhicule enroulé d'un bandeau type cadeau" class="service-img" />
                <div class="txt-resize-service">
                    <h3 class="service-article-title">Occasion</h3>
                    <div class="service-article-txt">
                        <p>Venez découvrir tout nos véhicules</p>

                    </div>
                </div>
                <div class="carbon-color service-article-footer"></div>
            </a>
        </article>
    </div>

</section>
<section class="carbon-color" id="avis">
    <h2 class="second-color-text avis-section-title">VOS AVIS</h2>
    <p class="avis-txt-p">votre satisfaction est au coeur de nos préoccupations, pour que l'on continue de nous améliorer, ainsi que d'améliorer nos prestations Partagez-nous votre expérience!</p>
    <div class="avis-section-container">
        <div class="avis-txt-part">
            <?php
            //ADD ALL AVIS TO AN ARRAY
            if (!empty($allAvis)) {
                foreach ($allAvis as $avis) :
                    if ($avis['status'] !== 'pending') {
                        array_push($avisArray, [$avis['id'], $avis['auteur'], $avis['date'], $avis['contenu'], $avis['note']]);
                    }
                endforeach;
                if (!empty($avisArray)) {
                    //UPLOAD SOME FUNCTIONS
                    $taille = count($avisArray) - 1;
                    $starNmb = $avisArray[$taille][4];
                    $stars = '';
                    //FUNCTION TO  GET STARS NUMBER TO SHOW ON LASTEST MSG
                    function getStars(int $starNmb, string $stars)
                    {
                        for ($i = 0; $i < 5; $i++) {
                            if ($starNmb > $i) {
                                $stars .= '<i class="fa-solid fa-star"></i>';
                            } else {
                                $stars .= '<i class="fa-regular fa-star"></i>';
                            }
                        }
                        return $stars;
                    }
                    //FUNCITON TO GET EMOJI TO SHOW ON LASTEST MSG
                    function getEmojiToReturn(int $starNmb)
                    {
                        if ($starNmb < 3) {
                            return '<i class="fa-solid fa-face-sad-tear red-emoji avis-emoji"></i>';
                        } else if ($starNmb === 3) {
                            return '<i class="fa-solid fa-face-meh orange-emoji avis-emoji"></i>';
                        } else {
                            return '<i class="fa-solid fa-face-smile-wink green-emoji avis-emoji"></i>';
                        }
                    }

            ?>
                    <script>
                        var newArray = <?php echo json_encode($avisArray); ?>;
                        var actualAvisId = newArray.length - 1;
                    </script>
                    <div class="arrow-container"><i class="fa-solid fa-caret-left" id="avis-left-arrow" onclick="actualAvisId = switchLeft(newArray,actualAvisId)"></i></div>
                    <div id="avis-container">
                        <div class="emoji-container"><?php echo  getEmojiToReturn($starNmb); ?></div>
                        <div class="avis-tilte">
                            <div><?php echo $avisArray[$taille][1]; ?></div>
                            <div><?php echo $avisArray[$taille][2]; ?></div>
                        </div>
                        <div class="avis-contenu"><?php echo $avisArray[$taille][3]; ?></div>
                        <div class="avis-note"><?php echo getStars($starNmb, $stars); ?></div>
                    </div>
                    <div class="arrow-container"><i class="fa-solid fa-caret-right" id="avis-right-arrow" onclick="actualAvisId = switchRight(newArray,actualAvisId)"></i></div>
                <?php } else { ?>
                    <div id="avis-container">
                        <div class="emoji-container"><i class="fa-solid fa-face-smile-wink green-emoji avis-emoji"></i></div>
                        <div class="avis-tilte">
                            <div></div>
                            <div></div>
                        </div>
                        <div class="avis-contenu">Soyez le premier à nous laissez un commentaire!</div>
                        <div class="avis-note"></div>
                    </div>


                <?php  }
            } else { ?>
                <div id="avis-container">
                    <div class="emoji-container"><i class="fa-solid fa-face-smile-wink green-emoji avis-emoji"></i></div>
                    <div class="avis-tilte">
                        <div></div>
                        <div></div>
                    </div>
                    <div class="avis-contenu">Soyez le premier à nous laissez un commentaire!</div>
                    <div class="avis-note"></div>
                </div>


            <?php  } ?>

        </div>
        <div class="avis-form-part">
            <form method="post" id="avis-form" onsubmit="return onCommentSubmit()">
                <div class="display-flex-column">
                    <label for="avis-post-name" class="form-avis-label">Nom: </label>
                    <input class="form-avis-input-txt" type="text" name="auteur" id="avis-post-name" required />
                </div>
                <div class="display-flex-column">
                    <label for="avis-post-content" class="form-avis-label">Message&nbsp;:</label>
                    <textarea id="avis-post-content" name="contenu" maxlength="500" required></textarea>
                </div>
                <div class="selecter-line">
                    <div class="avis-post-note">Note :</div>
                    <select name="note" id="note-selecter" required>
                        <option value='' selected></option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                    </select>
                </div>
                <div class="form-button-line">
                    <input type="submit" value="Envoyer" id="avis-post-button" class="button-primary" />
                </div>
            </form>
        </div>
    </div>
</section>