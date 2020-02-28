<?php
require_once("views/View.php");

class ControllerDashboard {
    private $_view;
    private $_error;

    public function __construct($err) {
        $this->_error = $err;
        $this->loadView();
    }

    private function loadView() {
        $this->_view = new View();
        $this->_view->loadPage("head_dashboard");

        $commandes_prepa = "";
        $commandes_payer = "";

        $ingredients = ["ingredient", "legume", "fromage", "sauce"];
        foreach(Order::getMenusNonPrepa() as $order) {
            $id_pates = Order::getContenuItem("contenu_pates", $order['id'])['ID_pates'];
            $pates = Order::getItem("pates", $id_pates)['nom'];

            $commandes_prepa .= "
                <div class=\"dashboard_order_non_termine_order\">
                    <button class='dashboard_order_button' onclick=\"window.location.href = 'dashboard?prepared=" . $order['id'] . "'\">Préparer</button>
                    <div class=\"dashboard_order_alltext\">
                        <div class=\"dashboard_order_title\">>> MENU " . $pates . "&nbsp{ <i>id: " . $order['id'] . "</i> &nbsp}</div>";

            foreach($ingredients as $ingredient) {
                $items = Order::getContenuItem("contenu_" . $ingredient, $order['id']);
                if(!empty($items)) { //if item exist in order
                    $commandes_prepa .= "
                                    <div class=\"dashboard_order_text\">
                                        <b>" . $ingredient . " :</b>
                                        <span>" . Order::getItem($ingredient, $items['ID_' . $ingredient])['nom'] . "</span>
                                    </div>";
                }
            }
            $commandes_prepa .= "
                    </div>
                </div>";
        }

        foreach(Order::getMenusNonPayer() as $order) {
            $id_pates = Order::getContenuItem("contenu_pates", $order['id'])['ID_pates'];
            $pates = Order::getItem("pates", $id_pates)['nom'];
            $commandes_payer .= "
                <div class=\"dashboard_order_non_termine_order\">
                    <button class='dashboard_order_button' onclick=\"window.location.href = 'dashboard?payed=" . $order['id'] . "'\">Payé</button>
                    <div class=\"dashboard_order_alltext\">
                        <div class=\"dashboard_order_title\">>> MENU " . $pates . "&nbsp{ <i>id: " . $order['id'] . "</i> prix: " . $order['prix'] . " € }</div>";

            foreach($ingredients as $ingredient) {
                $items = Order::getContenuItem("contenu_" . $ingredient, $order['id']);
                if(!empty($items)) { //if item exist in order
                    $commandes_payer .= "
                                    <div class=\"dashboard_order_text\">
                                        <b>" . $ingredient . " :</b>
                                        <span>" . Order::getItem($ingredient, $items['ID_' . $ingredient])['nom'] . "</span>
                                    </div>";
                }
            }
            $commandes_payer .= "
                    </div>
                </div>";
        }

        require_once("views/ViewDashboard.php");
        $this->_view->loadPage("footer");

        if(!isset($_SESSION['login'])) {
            echo "<script>redirect('home')</script>";
        } else if(isset($_GET['prepared'])) {
            Order::setMenuPrepared($_GET['prepared']);
            echo "<script>redirect('dashboard')</script>";
        } else if(isset($_GET['payed'])) {
            Order::setMenuPayed($_GET['payed']);
            echo "<script>redirect('dashboard')</script>";
        }

    }
}