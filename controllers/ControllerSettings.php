<?php
require_once("views/View.php");

class ControllerSettings {
    private $_view;
    private $_error;

    public function __construct($err) {
        $this->_error = $err;
        $this->loadView();
    }

    private function loadView() {
        $this->_view = new View();
        $this->_view->loadPage("head_dashboard");

        $products = "";
        $types = ["pates", "ingredient", "legume", "fromage", "sauce"];

        foreach($types as $type) {
            $products .= "<option value=\"".$type."\">".$type."</option>";
        }

        if(isset($_POST['submit_password'])) {
            if ($_POST['password_modify'] === $_POST['password_modify2']) {
                Users::setPassword(htmlspecialchars($_POST['password_modify']));
            } else {
                echo "<script>alert('Les deux champs sont différents !')</script>";
            }
        }

        if(isset($_POST['submit_newproduct'])) {
            if($_POST['type_new_object'] !== 0) {
                if(!empty($_POST['nom_new_object']) && !empty($_POST['prix_new_object'])) {
                    Order::setProduct($_POST['type_new_object'], $_POST['nom_new_object'], $_POST['prix_new_object']);
                } else {
                    echo "<script>alert('Un ou des champs sont vides !')</script>";
                }
            } else {
                echo "<script>alert('Veuillez selectionner un type de produit !')</script>";
            }
        }

        require_once("views/ViewSettings.php");
        $this->_view->loadPage("footer");

        if(!isset($_SESSION['login'])) {
            echo "<script>redirect('home')</script>";
        }
    }
}