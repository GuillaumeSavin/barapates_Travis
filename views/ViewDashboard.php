<div class="content">

    <div class="dashboard_orders_non_termine">
        <div class="dashboard_orders_non_termine_title">Commandes en cours de prépa.</div>
        <?= $commandes_prepa ?>
    </div>

    <div class="dashboard_orders_non_termine">
        <div class="dashboard_orders_non_termine_title">Commandes attente de paiement</div>
        <?= $commandes_payer ?>
    </div>

    <div class="dashboard_orders_non_termine">
        <div class="dashboard_orders_non_termine_title">Plan du restaurant</div>
        <img class="dashboard_map" src="public/img/map.png">
    </div>

    <div class="bilan_semaine">
        <div class="dashboard_orders_non_termine_title">Bilan des 7 derniers jours</div>
        <div id="bilan_semaine_chart"></div>
    </div>

</div>

<script>
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Jours', 'Commandes', 'Profit (€)'],
            ['il y a 7 jours', <?= Order::getCountMenusDays(7) ?>, <?= Order::getTotalPrixMenusDays(7) ?>],
            ['il y a 6 jours', <?= Order::getCountMenusDays(6) ?>, <?= Order::getTotalPrixMenusDays(6) ?>],
            ['il y a 5 jours', <?= Order::getCountMenusDays(5) ?>, <?= Order::getTotalPrixMenusDays(5) ?>],
            ['il y a 4 jours', <?= Order::getCountMenusDays(4) ?>, <?= Order::getTotalPrixMenusDays(4) ?>],
            ['il y a 3 jours', <?= Order::getCountMenusDays(3) ?>, <?= Order::getTotalPrixMenusDays(3) ?>],
            ['avant hier', <?= Order::getCountMenusDays(2) ?>, <?= Order::getTotalPrixMenusDays(2) ?>],
            ['hier', <?= Order::getCountMenusDays(1) ?>, <?= Order::getTotalPrixMenusDays(1) ?>],
            ['aujourd\'hui', <?= Order::getCountMenusDays(0) ?>, <?= Order::getTotalPrixMenusDays(0) ?>],
        ]);
        var options = { 'backgroundColor': 'transparent' };
        var chart = new google.charts.Bar(document.getElementById('bilan_semaine_chart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>