<div class="confirm_order">
    <div class="confirm_order_title">Résumé de la commande</div>

    <div class="confirm_order_ticket">
        <?= $ticket ?>

        <div class="confirm_order_ticket_total">
            <div class="confirm_order_ticket_menu">TOTAL</div>
            <div class="confirm_order_ticket_price"><?= $total ?>&nbsp€</div>
        </div>
    </div>

    <form class="confirm_order_valid" method="post" action="">
        <div class="g-recaptcha" data-sitekey="6LeVdr0UAAAAABz07_6gCeaY8IKaRnkk9wXq4bKw"></div>
        <input type="checkbox" name="check_cgu">j'accepte les <a href="">conditions d'utilisations</a>.
        <input type="submit" name="post_confirm_order" value="Valider la commande">
        <a href="thanks" class="order_cancel">Annuler la commande</a>
    </form>



</div>


