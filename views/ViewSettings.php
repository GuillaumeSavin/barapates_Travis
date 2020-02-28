<div class="content">
    <div class="settings_block">
        <div class="settings_block_title">Modifier le mode de passe</div>
        <form method="post" action="">
            <input type="password" name="password_modify" placeholder="Nouveau mot de passe">
            <input type="password" name="password_modify2" placeholder="Confirmer mot de passe">
            <input type="submit" name="submit_password">
        </form>
    </div>

    <div class="settings_block">
        <div class="settings_block_title">Créer un nouveau produit</div>
        <form method="post" action="">
            <select name="type_new_object">
                <option value="0">--- type ---</option>
                <?= $products ?>
            </select>
            <input type="text" name="nom_new_object" placeholder="nom">
            <input type="text" name="prix_new_object" placeholder="prix">
            <input type="submit" name="submit_newproduct">
        </form>
    </div>




</div>