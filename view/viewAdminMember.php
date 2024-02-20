<?php
require_once '../controllers/controllerMember.php';
$ctrlMember = new ControllerMember();
$users = $ctrlMember->getMember();
?>

<div class="user-title">
    <h2>GESTIONNAIRE D'UTILISATEUR</h2>
    <div><i class="fa-solid fa-user-plus" id="add-new-user" onclick="newUserModal()"></i></div>
</div>
<div class="user-line-container">
    <div class='user-line displayed-late-line'>
        <div class="user-box">Nom</div>
        <div class="user-box">Prénom</div>
        <div class="user-box">Email</div>
        <div class="user-box">Fonction</div>
        <div class="user-box">Droit</div>
        <div class="user-box">Supprimer</div>
    </div>
    <div class="overflow">
        <?php
        foreach ($users['users'] as $user) :
        ?>
            <div class='user-line'>
                <div class="user-box"><?= $user['name'] ?></div>
                <div class="user-box"><?= $user['surname'] ?></div>
                <div class="user-box"><?= $user['email'] ?></div>
                <div class="user-box"><?= $user['function'] ?></div>
                <div class="user-box"><?= $user['profil'] ?></div>
                <?php if ($user['profil'] == 'admin') { ?>
                    <div class="user-box">Suppression impossible</div>
                <?php } else { ?>
                    <div class="user-box"><i class="fa-solid fa-user-xmark user-lass" id='<?= $user['id'] ?>' onclick="deleteUser(this)"></i></div>
                <?php } ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>