<?php
require_once("views/View.php");

class ControllerOrder {
    private $_view;
    private $_error;

    public function __construct($err) {
        $this->_error = $err;
        $this->loadView();
    }

    private function loadView() {
        $this->_view = new View();
        $this->_view->loadPage("head_dashboard");

        $commandes = "";
        $ingredients = ["ingredient", "legume", "fromage", "sauce"];
        $quantity = 10;
        if(isset($_GET['quantity'])) {
            $quantity = $_GET['quantity'];
        }

        foreach(Order::getMenus($quantity) as $order) {
            $id_pates = Order::getContenuItem("contenu_pates", $order['id'])['ID_pates'];
            $pates = Order::getItem("pates", $id_pates)['nom'];
            $commandes .= "
                <div class=\"dashboard_order_non_termine_order\">
                    <div class=\"dashboard_order_alltext\">
                        <div class=\"dashboard_order_title\">>> MENU ".$pates."&nbsp{ <i>id: ".$order['id']."</i> &nbsp | <i>prix:</i> ".$order['prix']." €}</div>";
            foreach($ingredients as $ingredient) {
                $items = Order::getContenuItem("contenu_".$ingredient, $order['id']);
                if(!empty($items)) { //if item exist in order
                    $commandes .= "
                                    <div class=\"dashboard_order_text\">
                                        <b>".$ingredient." :</b>
                                        <span>".Order::getItem($ingredient, $items['ID_'.$ingredient])['nom']."</span>
                                    </div>";
                }
            }
            $commandes .= "
                    </div>";

            if($order['payer'] === "0") {
                $commandes .= "<button style='background: #fff; color: crimson; border: 1px solid crimson;'
                onmouseover='this.style.color=\"#fff\"; this.style.background=\"crimson\"' 
                onmouseout='this.style.color=\"crimson\"; this.style.background=\"#fff\"' 
                class='button_statut' onclick='redirect(\"order?setMenuPayed=".$order['id']."\")'>payé : non</button>";
            } else {
                $commandes .= "<button style='background: #fff; color: darkolivegreen; border: 1px solid darkolivegreen;'
                onmouseover='this.style.color=\"#fff\"; this.style.background=\"darkolivegreen\"' 
                onmouseout='this.style.color=\"darkolivegreen\"; this.style.background=\"#fff\"' 
                class='button_statut' onclick='redirect(\"order?setMenuNonPayed=".$order['id']."\")'>payé : oui</button>";
            }

            if($order['preparer'] === "0") {
                $commandes .= "<button style='background: #fff; color: crimson; border: 1px solid crimson;'
                onmouseover='this.style.color=\"#fff\"; this.style.background=\"crimson\"' 
                onmouseout='this.style.color=\"crimson\"; this.style.background=\"#fff\"' 
                class='button_statut' onclick='redirect(\"order?setMenuPrepared=".$order['id']."\")'>préparé : non</button>";
            } else {
                $commandes .= "<button style='background: #fff; color: darkolivegreen; border: 1px solid darkolivegreen;'
                onmouseover='this.style.color=\"#fff\"; this.style.background=\"darkolivegreen\"' 
                onmouseout='this.style.color=\"darkolivegreen\"; this.style.background=\"#fff\"' 
                class='button_statut' onclick='redirect(\"order?setMenuNonPrepared=".$order['id']."\")'>préparé : oui</button>";
            }

            $commandes .= "
                </div>";
        }

        $html_options = "";
        $options = ["10", "25", "50", "100"];

        if(isset($_GET['quantity'])) {
            $html_options .= "<option value='".$_GET['quantity']."'>".$_GET['quantity']."</option>";
            foreach($options as $option) {
                if($option !== $_GET['quantity']) {
                    $html_options .= "<option value='".$option."'>".$option."</option>";
                }
            }
        } else {
            foreach($options as $option) {
                $html_options .= "<option value='".$option."'>".$option."</option>";
            }
        }

        require_once("views/ViewOrder.php");
        $this->_view->loadPage("footer");

        if(!isset($_SESSION['login'])) {
            echo "<script>redirect('index')</script>";
        }

        if(isset($_GET['setMenuPrepared'])) {
            Order::setMenuPrepared(htmlspecialchars($_GET['setMenuPrepared']));
            echo "<script>redirect('order')</script>";
        } else if(isset($_GET['setMenuNonPrepared'])) {
            Order::setMenuNonPrepared(htmlspecialchars($_GET['setMenuNonPrepared']));
            echo "<script>redirect('order')</script>";
        } else if(isset($_GET['setMenuPayed'])) {
            Order::setMenuPayed(htmlspecialchars($_GET['setMenuPayed']));
            echo "<script>redirect('order')</script>";
        } else if(isset($_GET['setMenuNonPayed'])) {
            Order::setMenuNonPayed(htmlspecialchars($_GET['setMenuNonPayed']));
            echo "<script>redirect('order')</script>";
        }
    }
}