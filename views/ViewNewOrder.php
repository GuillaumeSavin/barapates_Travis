<div class="content">
    <div class="new_order">
        <div class="new_order_title">Passer une nouvelle commande</div>

        <div class="new_order_menu">
            Selectionnez un menu :
            <select id="new_order_pates" onchange="redirect('neworder?m=1'+this.value)">
                <?= $menus ?>
            </select>
        </div>
        <div class="new_order_menu">
            Selectionnez les composants :
            <br>
            <?= $components ?>
        </div>

        <div class="new_order_menu">
            Résumé :
            <div class="new_order_selected_ingredients">
                <?= $resume ?>
            </div>
        </div>

        <form action="" method="POST">
            <button onclick="redirect()" class="new_order_reset">Recommencer</button>
            <input type="submit" class="new_order_submit" name="new_order_submit" value="Valider la commande">
        </form>
    </div>
</div>