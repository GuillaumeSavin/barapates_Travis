<?php
require_once("views/View.php");

class ControllerConfirmOrder {
    private $_view;

    public function __construct($url) {
        $this->loadView($url);
    }

    private function loadView($url) {
        $this->_view = new View();
        $this->_view->loadPage("head");

        if ($commandes = explode("?", stripcslashes(trim($_SERVER['REQUEST_URI'])))[1]) {
            $ticket = "";
            $total = 0;

            $menus = explode("&", $commandes);
            $prix_menus = array();
            $types = [1 => "pates", 2 => "ingredient", 3 => "legume", 4 => "fromage", 5 => "sauce"];

            $i = 0;
            foreach($menus as $menu) {
                $ingredients = str_split($menu, 2);
                $notPates=0;
                foreach($ingredients as $ingredient) {
                    if($notPates === 0) {
                        $ticket.= "<div class=\"confirm_order_ticket_menu\">>> MENU ".
                            Order::getItem($types[$ingredient[0]], $ingredient[1])["nom"]."</div>
                            <div class=\"confirm_order_ticket_menu_price\">".
                            Order::getItem($types[$ingredient[0]], $ingredient[1])["prix"]."&nbsp€</div>";
                        $notPates++;
                    } else {
                        $ticket.= "<div class=\"confirm_order_ticket_title\"><b>".$types[$ingredient[0]]."</b> : ".
                            Order::getItem($types[$ingredient[0]], $ingredient[1])["nom"]."</div>
                        <div class=\"confirm_order_ticket_price\">".
                            Order::getItem($types[$ingredient[0]], $ingredient[1])["prix"]."&nbsp€</div>";
                    }
                    if (empty($prix_menus[$i])) {
                        $prix_menus[$i] = Order::getItem($types[$ingredient[0]], $ingredient[1])["prix"];
                    } else {
                        $prix_menus[$i] += Order::getItem($types[$ingredient[0]], $ingredient[1])["prix"];
                    }
                    $total += Order::getItem($types[$ingredient[0]], $ingredient[1])["prix"];
                }
                $i++;
            }

            if(isset($_POST['post_confirm_order'])) {
                if(!empty($_POST['check_cgu'])) {
                    $key = "6LeVdr0UAAAAAJDStRGrqZZptyF4wx8fpVzM_u7M";
                    $response = $_POST['g-recaptcha-response'];
                    $remoteip = $_SERVER['REMOTE_ADDR'];
                    $api_url = "https://www.google.com/recaptcha/api/siteverify?secret=".$key."&response=".$response."&remoteip=".$remoteip;
                    $decode = json_decode(file_get_contents($api_url), true);
                    if ($decode['success']) {
                        $i=0;
                        foreach($menus as $menu) {
                            Order::setMenu($prix_menus[$i]);
                            $last_menu = Order::getLastMenu();
                            $ingredients = str_split($menu, 2);
                            foreach($ingredients as $ingredient) {
                                Order::setitem("contenu_".$types[$ingredient[0]], $last_menu, $ingredient[1]);
                            }
                            $i++;
                        }
                        header('Location: Thanks');
                    } else {
                        echo "<script>alert('Erreur avec le reCAPTCHA !')</script>";
                    }
                } else {
                    echo "<script>alert('Veuillez accepter les conditions d\'utilisations pour continuer !')</script>";
                }
            }










        } else {
            header('Location: 400');
        }

        require_once("views/ViewConfirmOrder.php");
        $this->_view->loadPage("footer");
    }
}