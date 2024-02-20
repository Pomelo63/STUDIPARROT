<?php
require_once '../controllers/controllerAvis.php';
$ctrlAvis = new ControllerAvis();
$avis = $ctrlAvis->getCommentOrdered();
?>

<div class="user-title">
    <h2>GESTIONNAIRE DE COMMENTAIRE</h2>
    <div><i class="fa-solid fa-comment" id="add-new-comment-admin" onclick="openNewCommentModal()"></i></div>
</div>
<div class="user-line-container">
    <div class='user-line'>
        <div class="user-box">Date</div>
        <div class="user-box">Nom</div>
        <div class="user-box">Contenu</div>
        <div class="user-box">Note</div>
        <div class="user-box">Etat</div>
        <div class="user-box">Accepter</div>
        <div class="user-box">Supprimer</div>
    </div>
    <div class="overflow">
        <?php
        foreach (array_reverse($avis["avis"], TRUE) as $cle => $valeur) :
        ?>
            <div class='user-line' id='<?= $valeur['id'] ?>'>
                <div class="user-box"><?= $valeur['date'] ?></div>
                <div class="user-box"><?= $valeur['auteur'] ?></div>
                <div class="user-box"><?= $valeur['contenu'] ?></div>
                <div class="user-box"><?= $valeur['note'] ?></div>
                <div class="user-box"><?= $valeur['status'] ?></div>
                <?php if ($valeur['status'] == "actif") { ?>
                    <div class="user-box"></div>
                <?php } else { ?>
                    <div class="user-box"><i class="fa-solid fa-circle-check valid-comment" onclick="valideComment(this)"></i> </div>
                <?php } ?>
                <div class="user-box"><i class="fa-solid fa-user-xmark user-lass" onclick="deleteComment(this)"></i></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>