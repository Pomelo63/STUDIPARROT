<?php $this->titre = "Garage V.Parrot"; 

require_once "../controllers/controllerCar.php";
$car = new ControllerCar();
$result = $car->getMinMax();
?>
<div class="occasion-text-align-center">
    <h2 class="title_page">NOS OCCASIONS</h2>
</div>
<section class="main-occasion-top">
    <img class="main-occasion-top-img" src="../assets/images/peopsoccas.jpeg" alt="Deux vendeur d'automobile">
    <div class="main-occasion-top-txt">
        <div class="apropos-article-title">Nous vous accompagnons</div>
        <div class="title-section-outliner"></div>
        <div>Acheter un véhicule d'occasion peut être un vrai challenge.<br />
            On s'est déjà tous demandé : "Est-ce que je fais le bon choix?"<br />
            Mais chez nous, Rémi et Soane sont là pour vous accompagner dans votre projet.
            En attendant de venir à leur rencontre vous pouvez toujours consulter nos offres en ligne.</div>
    </div>
</section>
<nav class="occasion-filter-bar">
    <div class="">
        <div>Kilométrage</div>
        <div class="sliders_control">
            <input type="range" min="<?= $result['km'][0]['minkm'] ?>" max="<?= $result['km'][0]['maxkm'] ?>" value="<?= $result['km'][0]['minkm'] ?>" id="fromkmslider" class="slider" oninput="onChangeSlider('fromkmslider','tokmslider','fromkmInput','tokmInput')">
            <input type="range" min="<?= $result['km'][0]['minkm'] ?>" max="<?= $result['km'][0]['maxkm'] ?>" value="<?= $result['km'][0]['maxkm'] ?>" id="tokmslider" class="slider" oninput="onChangeSlider('fromkmslider','tokmslider','fromkmInput','tokmInput')">
        </div>
        <div class="form_control">
            <div class="form_control_container__time__input" id="fromkmInput"><?= $result['km'][0]['minkm'] ?></div>
            <div class="form_control_container__time">-</div>
            <div class="form_control_container__time__input" id="tokmInput"><?= $result['km'][0]['maxkm'] ?></div>
        </div>
    </div>
    <div class="">
        <div>Prix</div>
        <div class="sliders_control">
            <input type="range" min="<?= $result['price'][0]['minprice'] ?>" max="<?= $result['price'][0]['maxprice'] ?>" value="<?= $result['price'][0]['minprice'] ?>" id="frompriceslider" class="slider" oninput="onChangeSlider('frompriceslider','topriceslider','frompriceInput','topriceInput')">
            <input type="range" min="<?= $result['price'][0]['minprice'] ?>" max="<?= $result['price'][0]['maxprice'] ?>" value="<?= $result['price'][0]['maxprice'] ?>" id="topriceslider" class="slider" oninput="onChangeSlider('frompriceslider','topriceslider','frompriceInput','topriceInput')">
        </div>
        <div class="form_control">
        <div class="form_control_container__time__input" id="frompriceInput"><?= $result['price'][0]['minprice'] ?></div>
            <div class="form_control_container__time">-</div>
            <div class="form_control_container__time__input" id="topriceInput"><?= $result['price'][0]['maxprice'] ?></div>
        </div>
    </div>
    <div class="">
        <div>Année</div>
        <div class="sliders_control">
            <input type="range" min="<?= $result['year'][0]['minyear'] ?>" max="<?= $result['year'][0]['maxyear'] ?>" value="<?= $result['year'][0]['minyear'] ?>" id="fromyearslider" class="slider" oninput="onChangeSlider('fromyearslider','toyearslider','fromyearInput','toyearInput')">
            <input type="range" min="<?= $result['year'][0]['minyear'] ?>" max="<?= $result['year'][0]['maxyear'] ?>" value="<?= $result['year'][0]['maxyear'] ?>" id="toyearslider" class="slider" oninput="onChangeSlider('fromyearslider','toyearslider','fromyearInput','toyearInput')">
        </div>
        <div class="form_control">
        <div class="form_control_container__time__input" id="fromyearInput"><?= $result['year'][0]['minyear'] ?></div>
            <div class="form_control_container__time">-</div>
            <div class="form_control_container__time__input" id="toyearInput"><?= $result['year'][0]['maxyear'] ?></div>
        </div>
    </div>
</nav>
<section class="occasion-card-container" id='carsForSales'>
<?php 
require_once '../view/viewOccasionCard.php';
?>
</section>