
<div class="login-modal-background" onclick="closeAddUserModal()"></div>
<div class="login-modal">
<i class="fa-solid fa-circle-xmark redcross-modal"onclick="closeAddUserModal()"></i>
    <form method="POST" id="add-user-form" onsubmit="return addUser()">
        <label for="userName">Nom:</label>
        <input type="text" name="userName" id="user-name" class="login-modal-input" required>
        <label>Prénom:</label>
        <input type="text" name="userSurname" id="user-surname" class="login-modal-input" required>
        <label>Email:</label>
        <input type="text" name="userEmail" id="user-email" class="login-modal-input" required>
        <label>Mot de passe:</label>
        <input type="text" name="userPassword" id="user-password" class="login-modal-input" required>
        <label>Fonction:</label>
        <input type="text" name="userFunction" id="user-function" class="login-modal-input" required>
        <label>Droit:</label>
        <select id="user-right" required>
            <option value="user">utilisateur</option>
            <option vlaue="admin">admin</option>
        </select>
        <input type="submit" value="Ajouter" id="login-button" />
    </form>
</div>