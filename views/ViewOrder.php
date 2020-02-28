<div class="content">
    <div class="order_consult_block">
        <div class="dashboard_orders_non_termine_title">Commandes à afficher</div>
        <form action="" method="post">
            Afficher les
            <select id="order_quantity" onchange="redirect('order?quantity='+document.getElementById('order_quantity').value)">
                <?= $html_options ?>
            </select>
        </form>
             dernières commandes.
    </div>
    <div class="order_consult_block">
        <div class="dashboard_orders_non_termine_title">Consulter les commandes <i>(Cliquez sur les boutons pour changer le status)</i></div>
        <?= $commandes ?>
    </div>
</div>