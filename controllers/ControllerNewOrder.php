<?php
require_once("views/View.php");

class ControllerNewOrder {
    private $_view;
    private $_error;

    public function __construct($err) {
        $this->_error = $err;
        $this->loadView();
    }

    private function loadView() {
        $this->_view = new View();
        $this->_view->loadPage("head_dashboard");

        $menus = "";
        $menus_bdd = Order::getPates();
        if(isset($_GET['m'])) {
            $pates = Order::getItem("pates", htmlspecialchars($_GET['m'][1]));
            $menus .= "<option value='".$pates['id']."'>".$pates['nom']." [".$pates['prix']." €]</option>";
        } else {
            $menus .= "<option value=\"0\">--- Selectionnez un menu ---</option>";
        }
        foreach($menus_bdd as $menu) {
            $menus .= "<option value='".$menu['id']."'>".$menu['nom']." [".$menu['prix']." €]</option>";
        }

        $components = "";
        $types_ingredients = ["ingredient", "legume", "fromage", "sauce"];
        $types_ingredients_id = 2;
        foreach($types_ingredients as $type_ingredient) {
            $components .= "<div class=\"new_order_select_ingredients\">";
            $components .= "<div class=\"new_order_select_ingredients_title\">$type_ingredient</div>";
            $ingredients = Order::getItems($type_ingredient);
            if (isset($_GET['m'])) {
                foreach($ingredients as $ingredient) {
                    $components .= "<button onclick=\"window.location.href ='neworder?m=".$_GET['m'].
                        $types_ingredients_id.$ingredient['id']."'\"class='new_order_select_ingredients_ingredient'>".
                        $ingredient['nom']." [".$ingredient['prix']."€]</button>";
                }
            }
            $types_ingredients_id++;
            $components .= "</div>";
        }

        $resume = "";
        if (isset($_GET['m'])) {
            $m = str_split(htmlspecialchars($_GET['m']), 2);
            array_shift($m);
            foreach($m as $item) {
                $item = Order::getItem($types_ingredients[intval($item[0])-2], $item[1]);
                $resume .= "<button class=\"new_order_selected_ingredients_button\">".$item['nom']."</button>";
            }
        }


        require_once("views/ViewNewOrder.php");
        $this->_view->loadPage("footer");

        if(!isset($_SESSION['login'])) {
            echo "<script>redirect('index')</script>";
        }

        if(isset($_POST['new_order_submit'])) {
            echo "<script>redirect('ConfirmOrder?".$_GET['m']."')</script>";
        }
    }
}