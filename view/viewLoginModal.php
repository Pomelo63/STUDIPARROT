
<div class="login-modal-container" id="">
    <div class="login-modal-background" id="" onclick="closeModal()"></div>
    <div class="login-modal">
        <i class="fa-solid fa-circle-xmark redcross-modal" onclick="closeModal()"></i>
        <div class='modal-user-icon'><i class="fa-solid fa-circle-user"></i></div>
        <div class="">Identifiez-vous</div>
        <form method="post" class="" id="connexion-form"  onsubmit="return onLoginSubmit()">
            <div class="login-form-row">
                <label for="umail" class="login-modal-label">Email: </label>
                <input class="login-modal-input" type="text" name="umail" id="umail" required />
            </div>
            <div class="login-form-row">
                <label for="upassword" class="login-modal-label">Mot de passe: </label>
                <input class="login-modal-input" type="password" name="upassword" id="upassword" required />
            </div>
            <div class="login-form-row">
                <input type="submit" value="Connexion" id="login-button" />
            </div>
        </form>
    </div>
</div>