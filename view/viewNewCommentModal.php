
<div class="login-modal-background" onclick="closeAddUserModal()"></div>
<div class="login-modal">
<i class="fa-solid fa-circle-xmark redcross-modal"onclick="closeAddUserModal()"></i>
    <form method="POST" id="add-user-form" onsubmit="return addNewCommentAdmin(this)">
        <label for="userName">Nom:</label>
        <input type="text" name="userName" id="admin-comment_name" class="login-modal-input" required>
        <label for="msg">Message:</label>
        <textarea name="msg" id="admin-comment_content" class="admin-info-textarea" maxlength="300" required></textarea>
        <label>Note:</label>
        <select id="admin-comment-note" required>
            <option value="1">1</option>
            <option vlaue="2">2</option>
            <option vlaue="3">3</option>
            <option vlaue="4">4</option>
            <option vlaue="5">5</option>
        </select>
        <input type="submit" value="Ajouter" id="login-button" />
    </form>
</div>